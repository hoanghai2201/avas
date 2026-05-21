cd D:\Setup\xampp\htdocs\avas
D:\Setup\xampp\mysql\bin\mysqldump -uroot -p"" avas > database.sql
git add database.sql
git commit -m "sync db"
git push