CREATE DATABASE united_tractor_leads_db;

CREATE TABLE produk (
    id_produk INT PRIMARY KEY,
    nama_produk VARCHAR(100)
);

CREATE TABLE sales (
    id_sales INT PRIMARY KEY,
    nama_sales VARCHAR(100)
);

CREATE TABLE leads (
    id_leads INT PRIMARY KEY AUTO_INCREMENT,
    tanggal DATE,
    id_sales INT,
    id_produk INT,
    no_wa VARCHAR(20),
    nama_lead VARCHAR(100),
    kota VARCHAR(100),
    id_user INT,
    FOREIGN KEY (id_sales) REFERENCES sales(id_sales),
    FOREIGN KEY (id_produk) REFERENCES produk(id_produk)
);