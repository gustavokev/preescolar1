SELECT a.`nombre_al`, a.`gsa`, a.`padres`, gsa.`gsa`, g.`grado`, s.`seccion`, ae.`anio`, m.`nombre_m`, m.`nombre_a`, d.`nombre_re` FROM alumnos a 
INNER JOIN grado_seccion_anio gsa ON a.`gsa_id`=gsa.`id`
INNER JOIN grados g ON gsa.`grado_id`=g.`id`
INNER JOIN secciones s ON gsa.`seccion_id`=s.`id`
INNER JOIN anio_escolar ae ON gsa.`anio_id`=ae.`id`
INNER JOIN maestros m ON a.`id`=m.`alumnos1_id` OR a.`id`=m.`alumnos2_id`
INNER JOIN datos d ON d.`id`=a.`datos1_id` OR d.`id`=a.`datos2_id`
