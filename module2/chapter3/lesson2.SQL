/*
SELECT slots.*, users.username
FROM slots
JOIN users
*/

/*
slots table
 id| name| usu_id|
  1| slo1|      1|
  2| slo2|      1|
  3| slo3|      1|
  4| slo4|      1|
  
users table
 id| name| 
  1| usu1|
  2| usu2|
  
mysql: tmp table
 id| name| usu_id| 
  1| slo1|      1| 1| usu1|
  2| slo2|      1| 1| usu1|
  3| slo3|      1| 1| usu1|
  4| slo4|      1| 1| usu1|
  1| slo1|      1| 2| usu2|
  2| slo2|      1| 2| usu2|
  3| slo3|      1| 2| usu2|
  4| slo4|      1| 2| usu2|
*/


-- mysql: tmp table
/*
SELECT slots.*, users.username
FROM slots
JOIN users ON slots.usu_id=users.id
*/

/*
mysql: tmp table
 id| name| usu_id| 
  1| slo1|      1| 1| usu1|
  2| slo2|      1| 1| usu1|
  3| slo3|      1| 1| usu1|
  4| slo4|      1| 1| usu1|
*/
