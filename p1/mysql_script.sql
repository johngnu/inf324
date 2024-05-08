CREATE TABLE persona (
    ci varchar(16) NOT NULL,
    nombres varchar(255) NOT NULL,
    paterno varchar(255),
    materno varchar(255),
    direccion varchar(255),
    celular int,
	departamento varchar(50),
    PRIMARY KEY (ci)
);

CREATE TABLE tipo_cuenta (
    id int NOT NULL,
    descripcion varchar(255) NOT NULL,
    monto_minimo double NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO tipo_cuenta(id, descripcion, monto_minimo) VALUES (1,'CAJA DE AHORRO',0);
INSERT INTO tipo_cuenta(id, descripcion, monto_minimo) VALUES (2,'CUENTA CORRIENTE',500);
INSERT INTO tipo_cuenta(id, descripcion, monto_minimo) VALUES (3,'DEPOSITO A PLAZO FIJO',1000);

CREATE TABLE cuenta (
    nro varchar(255) NOT NULL,
    ci varchar(16) NOT NULL,
    tipo_cuenta int NOT NULL,
    monto double NOT NULL,
    registro date NOT NULL,
	estado varchar(2) NOT NULL,
    PRIMARY KEY (nro),
    FOREIGN KEY (ci) REFERENCES persona(ci),
    FOREIGN KEY (tipo_cuenta) REFERENCES tipo_cuenta(id)
);

CREATE TABLE transaccion (
    nro varchar(255) NOT NULL,
    cuenta varchar(255) NOT NULL,
	movimiento varchar(2) NOT NULL,    
    monto double NOT NULL,
    registro timestamp NOT NULL,
    PRIMARY KEY (nro),
    FOREIGN KEY (cuenta) REFERENCES cuenta(nro)
);

-- PERSONA
insert into persona values('556644', 'Pamela Helen','Gutierrez','Flores','C. 23 Villa Fátima No. 10',62211011,'OR');
insert into persona values('133223', 'Sofia','Gutierrez','Lara','C. 11 Mallasa No. 1010',74882221,'LP');
insert into persona values('100045', 'Ramiro','Flores','Flores','Av. H. Siles Obrajes No. 85',63121230,'BN');
insert into persona values('100455', 'Roberto','Quispe','Choque','C. 6 San Simón SN',60757846,'PD');
insert into persona values('2033333', 'Carlos','Mamani','Rios','Burgaleta V. Copacabana No. 110',70145612,'PT');
insert into persona values('7474745', 'José','Mendoza','Plata','Av. 12 de marzo No. 156 El Alto',50455666,'LP');
insert into persona values('3569784', 'José','Mendoza','Plata','Av. 12 de marzo No. 156 Cochabamba',50455666,'CB');
insert into persona values('2323456', 'José Maria','Gimenez','Torrez','Av. 12 de marzo No. 156 Satélite',50455666,'SC');
insert into persona values('1007777', 'Roberto Carlos','Quisbert','Plata','Av. 12 de marzo No. 156 El Alto',74111111,'TR');

-- CUENTA
insert into cuenta values('10002100','3569784', 1,8000,now());
insert into cuenta values('10002101','3569784', 2,1000,now());
insert into cuenta values('10002102','2323456', 1,700,now());
insert into cuenta values('10002103','1007777', 1,500,now());
insert into cuenta values('10002345','556644', 1,800,now());
insert into cuenta values('10002346','133223', 1,10000,now());
insert into cuenta values('10002347','100045', 1,1000,now());
insert into cuenta values('10002348','100455', 1,15000,now());
insert into cuenta values('10002349','2033333', 1,300,now());
insert into cuenta values('10002350','7474745', 1,100,now());
insert into cuenta values('10002370','556644', 2,8000,now());
insert into cuenta values('10002371','100045', 1,800,now());
insert into cuenta values('10002372','133223', 1,800,now());
insert into cuenta values('10002373','2033333', 1,800,now());
insert into cuenta values('10002390','4885794', 1,800,now());
insert into cuenta values('10002391','4885794', 2,50000,now());
