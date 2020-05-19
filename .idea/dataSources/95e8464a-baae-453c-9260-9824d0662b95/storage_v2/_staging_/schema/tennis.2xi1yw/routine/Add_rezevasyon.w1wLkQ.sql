CREATE PROCEDURE Add_rezevasyon(
  IN `_kort_id`    INT(10),
  IN `_kiralayan_id` INT(10),
  IN `_baslangis_saat` TIMESTAMP,
  IN `_bitis_saat` TIMESTAMP,
  IN `_servis_adresi` VARCHAR(255)
)
  BEGIN
set @_servis_saat=(select subdate(_baslangis_saat,INTERVAL 30 minute));
set @saat_adet= (select hour(_bitis_saat) -(select hour(_baslangis_saat)));
set @_saat_ucreti=(select tennis_db.korts.saat_ucreti from korts where tennis_db.korts.id=_kort_id);
set @_saat_puani =(select tennis_db.korts.saat_puani from korts where tennis_db.korts.id=_kort_id);
set @_odenecek=(@_saat_ucreti+@saat_adet);
set @_kazanacak_puan=((@saat_adet * @_saat_puani) + ((@saat_adet-1)*5));
select @_kazanacak_puan,@_odenecek,@_saat_ucreti,@_saat_puani;

set @_servis_id=(SELECT min(tennis_db.servis.id)
from tennis_db.servis 
INNER  join 	tennis_db.rezervasyons
where
tennis_db.rezervasyons.servis_id  !=tennis_db.servis.id 
and 
tennis_db.servis.durum=0
and  
tennis_db.rezervasyons._servis_saat != @_servis_saat
and
tennis_db.rezervasyons.durum=0

);

INSERT INTO `tennis_db`.`rezervasyons`
(
`kort_id`,
`kiralayan_id`,
`servis_id`,
`baslangis_saat`,
`bitis_saat`,
`servis_adresi`,
`servis_saat`,
`odenecek`,
`odenmis`,
`kazanacak_puan`,
`durum`
)
VALUES
(
_kort_id,
_kiralayan_id,
@_servis_id,
_baslangis_saat,
_bitis_saat,
_servis_adresi,
@_servis_saat,
@_odenecek,
0,
@_kazanacak_puan,
1
);
END;

