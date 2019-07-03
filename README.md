SELECT GROUP_CONCAT(YEAR(aol.fecha_hora) SEPARATOR ', ') AS 'AÑO', pd.codigo AS 'RENGLON',pd.nombre_objeto AS 'CONCEPTO',
(SELECT SUM(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo INNER JOIN administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
where MONTH(aor.fecha_hora) = 1 AND deo.idpresupuesto_disponible = de.idpresupuesto_disponible) AS 'ENERO',
(SELECT SUM(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo INNER JOIN administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
where MONTH(aor.fecha_hora) = 2 AND deo.idpresupuesto_disponible = de.idpresupuesto_disponible) AS 'FEBRERO',
(SELECT SUM(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo INNER JOIN administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
where MONTH(aor.fecha_hora) = 3 AND deo.idpresupuesto_disponible = de.idpresupuesto_disponible) AS 'MARZO',
(SELECT SUM(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo INNER JOIN administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
where MONTH(aor.fecha_hora) = 4 AND deo.idpresupuesto_disponible = de.idpresupuesto_disponible) AS 'ABRIL',
(SELECT SUM(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo INNER JOIN administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
where MONTH(aor.fecha_hora) = 5 AND deo.idpresupuesto_disponible = de.idpresupuesto_disponible) AS 'MAYO',
(SELECT SUM(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo INNER JOIN administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
where MONTH(aor.fecha_hora) = 6 AND deo.idpresupuesto_disponible = de.idpresupuesto_disponible) AS 'JUNIO',
(SELECT SUM(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo INNER JOIN administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
where MONTH(aor.fecha_hora) = 7 AND deo.idpresupuesto_disponible = de.idpresupuesto_disponible) AS 'JULIO',
(SELECT SUM(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo INNER JOIN administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
where MONTH(aor.fecha_hora) = 8 AND deo.idpresupuesto_disponible = de.idpresupuesto_disponible) AS 'AGOSTO',
(SELECT SUM(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo INNER JOIN administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
where MONTH(aor.fecha_hora) = 9 AND deo.idpresupuesto_disponible = de.idpresupuesto_disponible) AS 'SEPTIEMBRE',
(SELECT SUM(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo INNER JOIN administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
where MONTH(aor.fecha_hora) = 10 AND deo.idpresupuesto_disponible = de.idpresupuesto_disponible) AS 'OCTUBRE',
(SELECT SUM(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo INNER JOIN administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
where MONTH(aor.fecha_hora) = 11 AND deo.idpresupuesto_disponible = de.idpresupuesto_disponible) AS 'NOVIEMBRE',
(SELECT SUM(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo inner join administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
WHERE MONTH(aor.fecha_hora) = 12 AND deo.idpresupuesto_disponible = de.idpresupuesto_disponible) AS 'DICIEMBRE',
SUM((de.cantidad*de.precio_unitario)) AS 'S.ACUMULADO'
FROM detalle_orden de
RIGHT JOIN presupuesto_disponible pd
ON pd.idpresupuesto_disponible = de.idpresupuesto_disponible
LEFT JOIN administrar_ordenes aol ON aol.idadministrar_ordenes = de.idadministrar_ordenes
GROUP BY pd.codigo
