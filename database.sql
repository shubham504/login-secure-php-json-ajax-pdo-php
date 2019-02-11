CREATE TABLE  `users` (
    `id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `username` VARCHAR( 255 ) NOT NULL UNIQUE ,
    `password` VARCHAR( 255 ) NOT NULL ,
    `status` ENUM(  'Y',  'N' ) NOT NULL DEFAULT  'N'
);

INSERT INTO `users` (`id`, `username`, `password`, `status`) VALUES (NULL, 'admin', 'c0ce47bd96234bdfc5037be76eef3c32676cabdcb1a9d98d6ee45633502c72e695ca7b6a35c1bc88359087c71eac26add64b09a5d8d7da5f2c36d5859ad2fa2c' , 'Y');