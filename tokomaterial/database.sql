CREATE DATABASE db_bangunan;
USE db_bangunan;

CREATE TABLE material(
	idmaterial int(11) primary key auto_increment,
	kode varchar(10),
	nama varchar(100),
	harga decimal
);
CREATE TABLE persediaan(
	idpersediaan int(11) primary key auto_increment,
	tanggal date,
	jumlah_persediaan float,
	id_material int(11)
);
CREATE TABLE nota(
	idnota int(11) primary key auto_increment,
	nomor varchar(25),
	tanggal_nota date,
	pembeli varchar(50)
);
CREATE TABLE penjualan(
	idpenjualan int(11) primary key auto_increment,
	idmaterial int(11),
	idnota int(11),
	qty int(5),
	subtotal decimal
);