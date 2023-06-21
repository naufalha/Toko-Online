SELECT nasabah.nama_nasabah as "nama", rekening.saldo as 'saldo' 
    FROM nasabah
    JOIN nasabah_has_rekening ON nasabah.id_nasabah = nasabah_has_rekening.nasabah_id_nasabah
    JOIN rekening ON nasabah_has_rekening.rekening_no_rekening = rekening.no_rekening
    WHERE rekening.saldo > (SELECT AVG(rekening.saldo) FROM rekening);

SELECT COUNT(*) AS jumlah_transaksi
FROM transaksi
WHERE nasabah_id_nasabah = (
 SELECT nasabah_id_nasabah
 FROM rekening
 WHERE saldo = (
 SELECT MIN(saldo)
 FROM rekening
 )
 LIMIT 1
);

SELECT nama_nasabah
FROM nasabah
WHERE EXISTS (
 SELECT kode_cabang
 FROM cabang_bank
 WHERE NOT EXISTS (
 SELECT *
 FROM transaksi
 WHERE nasabah_id_nasabah = nasabah.id_nasabah
 AND cabang_id_cabang = cabang_bank.kode_cabang
 )
);


SELECT * from transaksi WHERE saldo < (SELECT AVG(saldo where tanggal = '2009-11-22' FROM transaksi) ) ; 


SELECT nama_cabang
FROM cabang_bank
WHERE kode_cabang = (
 SELECT cabang_bank_kode_cabang
 FROM rekening
 GROUP BY kode_cabang
 ORDER BY SUM(saldo) DESC
 LIMIT 1
);

SELECT * from nasabah,jumlah 
    JOIN transaksi ON transaksi.nasabah_id_nasabah = nasabah.id_nasabah
    WHERE (SELECT COUNT(nasabah_id_nasabah) FROM transaksi WHERE nasabah_id_nasabah = nasabah.id_nasabah) > 1


SELECT nama_nasabah FROM nasabah WHERE id_nasabah IN ( SELECT nasabah_id_nasabah FROM transaksi WHERE jumlah = ( SELECT MIN(jumlah) FROM transaksi ))limit 1;