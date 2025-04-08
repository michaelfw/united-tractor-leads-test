INSERT INTO produk (id_produk, nama_produk) VALUES
    (1, 'Cipta Residence 2'),
    (2, 'The Rich'),
    (3, 'Namorambe City'),
    (4, 'Grand Banten'),
    (5, 'Turi Mansion'),
    (6, 'Cipta Residence 1');

INSERT INTO sales (id_sales, nama_sales) VALUES
    (1, 'sales 1'),
    (2, 'sales 2'),
    (3, 'sales 3');

INSERT INTO leads (tanggal, id_sales, id_produk, no_wa, nama_lead, kota, id_user) VALUES
    ('2025-03-07', 1, 1, '08123456789', 'Fred', 'Surabaya', 1),
    ('2025-04-07', 2, 2, '08123456790', 'Cha', 'Jakarta', 1),
    ('2025-04-08', 3, 3, '08198765432', 'Mike', 'Malang', 1);