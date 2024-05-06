CREATE TABLE persona (
    ci varchar(16) NOT NULL,
    nombres varchar(255) NOT NULL,
    paterno varchar(255),
    materno varchar(255),
    direccion varchar(255),
    celular int,
    PRIMARY KEY (ci)
);

CREATE TABLE tipo_cuenta (
    id int NOT NULL,
    descripcion varchar(255) NOT NULL,
    monto_minimo float NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO tipo_cuenta(id, descripcion, monto_minimo) VALUES (1,'CAJA DE AHORRO',0);
INSERT INTO tipo_cuenta(id, descripcion, monto_minimo) VALUES (2,'CUENTA CORRIENTE',500);
INSERT INTO tipo_cuenta(id, descripcion, monto_minimo) VALUES (3,'DEPOSITO A PLAZO FIJO',1000);

CREATE TABLE cuenta (
    nro varchar(255) NOT NULL,
    ci varchar(16) NOT NULL,
    tipo_cuenta int NOT NULL,
    monto float NOT NULL,
    registro date NOT NULL,
    PRIMARY KEY (nro),
    FOREIGN KEY (ci) REFERENCES persona(ci),
    FOREIGN KEY (tipo_cuenta) REFERENCES tipo_cuenta(id)
);

CREATE TABLE transaccion (
    nro varchar(255) NOT NULL,
    cuenta varchar(255) NOT NULL,
	movimiento varchar(2) NOT NULL,    
    monto float NOT NULL,
    registro timestamp NOT NULL,
    PRIMARY KEY (nro),
    FOREIGN KEY (cuenta) REFERENCES cuenta(nro)
);
