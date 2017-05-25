CREATE TABLE IF NOT EXISTS 'images' (
'id' int(11) NOT NULL AUTO_INCREMENT,
'username' varchar(100) NOT NULL,
'title' varchar(100) NOT NULL,
'image' varchar(100) NOT NULL,
'description' varchar(200) NOT NULL,
'vote' int(11) NOT NULL;
    

PRIMARY KEY ('id')

) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1