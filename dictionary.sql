-- EMPTY DICTIONARY
TRUNCATE dictionary;
-- INSERT HIRAGANA
INSERT INTO dictionary(jp, en)
VALUES
('ん','n'),('わ','wa'),('ら','ra'),('や','ya'),('ま','ma'),('は','ha'),('な','na'),('た','ta'),('さ','sa'),('か','ka'),('あ','a'),
('ゐ','wi'),('り','ri'),('み','mi'),('ひ','hi'),('に','ni'),('ち','chi'),('し','shi'),('き','ki'),('い	','i'),
('る','ru'),('ゆ','yu'),('む','mu'),('ふ','fu'),('ぬ','nu'),('つ','tsu'),('す','su'),('く','ku'),('う','u'),
('ゑ','we'),('れ','re'),('め','me'),('へ','he'),('ね','ne'),('て','te'),('せ','se'),('け','ke'),('え','e'),
('を','o'),('ろ','ro'),('よ','yo'),('も','mo'),('ほ','ho'),('の','no'),('と','to'),('そ','so'),('こ','ko'),('お','o');


SELECT * FROM learnjp_db.dictionary;