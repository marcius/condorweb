DELIMITER $$

DROP PROCEDURE IF EXISTS `CreaBilancio` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `CreaBilancio`(
IN p_anno INT
)
BEGIN

DECLARE sezione varchar2(20);
DECLARE tot_cassa_b decimal(15,2);
DECLARE tot_cassa_c decimal(15,2);
DECLARE tot decimal(15,2);

set @sezione = 'riep_cassa';

select valore into @tot_cassa_b from bilanci where anno = p_anno-1 and sezione = @sezione and voce = 'tot_cassa_b';
select valore into @tot_cassa_c from bilanci where anno = p_anno-1 and sezione = @sezione and voce = 'tot_cassa_c';
select valore into @tot from bilanci where anno = p_anno-1 and sezione = @sezione and voce = 'tot';

delete from bilanci where anno = p_anno;
insert into bilanci (anno, sezione, voce, valore)
select p_anno anno,@sezione sezione, concat('tot_tipo_cassa_', tipo_transazione, '_', id_cassa) voce, sum_importo valore from (
select tipo_transazione, id_cassa, sum(importo * case tipo_transazione when 'U' then -1 else 1 end) sum_importo
from  transazioni where year(data_pagam) = p_anno group by tipo_transazione, id_cassa
) s
union all
select p_anno anno, @sezione sezione, concat('tot_tipo_', tipo_transazione) voce, sum_importo valore from (
select tipo_transazione, sum(importo * case tipo_transazione when 'U' then -1 else 1 end) sum_importo
from  transazioni where year(data_pagam) = p_anno group by tipo_transazione
) s;


insert into bilanci (anno, sezione, voce, valore)
select p_anno anno, @sezione sezione, 'tot_cassa_b' voce, sum_importo + ifnull(@tot_cassa_b, 0) valore from (
select id_cassa, sum(importo * case tipo_transazione when 'U' then -1 else 1 end) sum_importo
from  transazioni where year(data_pagam) = p_anno id_cassa = 'b'
) s;

insert into bilanci (anno, sezione, voce, valore)
select p_anno anno, @sezione sezione, 'tot_cassa_c' voce, sum_importo + ifnull(@tot_cassa_c, 0) valore from (
select id_cassa, sum(importo * case tipo_transazione when 'U' then -1 else 1 end) sum_importo
from  transazioni where year(data_pagam) = p_anno and id_cassa = 'c'
) s;

insert into bilanci (anno, sezione, voce, valore)
select p_anno anno, @sezione sezione, 'tot' voce, sum_importo + ifnull(@tot, 0) valore from (
select sum(importo * case tipo_transazione when 'U' then -1 else 1 end) sum_importo
from  transazioni where year(data_pagam) = p_anno
) s;

END $$

DELIMITER ;