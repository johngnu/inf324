-- Ejercicio 7 - 1er examen INF-324
-- Nombre: Johnston Castillo Valencia

select sum(case when departamento='LP' then monto else 0 end) LaPaz,
    sum(case when departamento='BN' then monto else '' end) Beni,
    sum(case when departamento='CB' then monto else '' end) Cochabamba,
    sum(case when departamento='OR' then monto else '' end) Oruro,
    sum(case when departamento='SC' then monto else '' end) SantaCruz,
    sum(case when departamento='TR' then monto else '' end) Tarija,
    sum(case when departamento='PT' then monto else '' end) Potosi,
    sum(case when departamento='CH' then monto else '' end) Chuquisaca,
    sum(case when departamento='PD' then monto else '' end) Pando
from (select p.departamento,sum(c.monto) monto
from persona p,cuenta c
where p.ci=c.ci
group by p.departamento) tablita