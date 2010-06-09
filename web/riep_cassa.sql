select 2009 anno, 'riep_cassa' sezione, concat('tot_tipo_cassa_', tipo_transazione, '_', id_cassa) voce, sum_importo valore from (
select tipo_transazione, id_cassa, sum(importo * case tipo_transazione when 'U' then -1 else 1 end) sum_importo
from  transazioni where year(data_pagam) = 2009 group by tipo_transazione, id_cassa
) s
union all
select 2009 anno, 'riep_cassa' sezione, concat('tot_tipo_', tipo_transazione) voce, sum_importo valore from (
select tipo_transazione, sum(importo * case tipo_transazione when 'U' then -1 else 1 end) sum_importo
from  transazioni where year(data_pagam) = 2009 group by tipo_transazione
) s
union all
select 2009 anno, 'riep_cassa' sezione, concat('tot_cassa_', id_cassa) voce, (sum_importo + (select ifnull(valore, 0) from bilanci where anno = 2008 and sezione = 'riep_cassa' and voce = concat('tot_cassa_', id_cassa))) valore from (
select id_cassa, sum(importo * case tipo_transazione when 'U' then -1 else 1 end) sum_importo
from  transazioni where year(data_pagam) = 2009 group by id_cassa
) s
union all
select 2009 anno, 'riep_cassa' sezione, concat('tot') voce, sum_importo valore from (
select sum(importo * case tipo_transazione when 'U' then -1 else 1 end) sum_importo
from  transazioni where year(data_pagam) = 2009
) s
