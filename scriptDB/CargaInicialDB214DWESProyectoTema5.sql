use DB214DWESProyectoTema5;

insert into T01_Usuario values
("admin", "paso", "Usuario administrador", now(), 1, 'administrador', null);

insert into T02_Departamento values
("UNO", "Primer departamento", curdate(), 30.45, null),
("DOS", "Segundo departamento", curdate(), 66.66, null),
("TRE", "Tercer departamento", curdate(), 1.11, null);