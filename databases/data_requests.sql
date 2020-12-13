#1 request
select NAME,
       COUNT(distinct ab.BOOK_ID)
from book_store bs
	     inner join author_book ab on bs.BOOK_ID = ab.BOOK_ID
	     inner join author a on ab.AUTHOR_ID = a.ID
group by NAME;

#2 request
select NAME,
       CITY,
       SUM(QUANTITY)
from book_store bs
	     inner join author_book ab on bs.BOOK_ID = ab.BOOK_ID
	     inner join store s on bs.STORE_ID = s.ID
	     inner join author a on ab.AUTHOR_ID = a.ID
group by NAME, CITY;

#3 request
select NAME,
       AVG(PRICE)
from book_store bs
	     inner join book b on bs.BOOK_ID = b.ID
where PUBLISHER_ID = 3
group by NAME;

#4 request
select CITY,
       NAME,
       AVG(PRICE)
from book_store bs
	     inner join book b on bs.BOOK_ID = b.ID
	     inner join store s on bs.STORE_ID = s.ID
where PUBLISHER_ID = 3
group by CITY, NAME;

#5 request
select NAME,
       bs1.QUANTITY                     as KLD_QUANTITY,
       bs2.QUANTITY                     as CHRK_QUANTITY,
       ABS(bs1.QUANTITY - bs2.QUANTITY) as VARIANCE
from book
	     left join book_store bs1 on book.ID = bs1.BOOK_ID and bs1.STORE_ID = 1
	     left join book_store bs2 on book.ID = bs2.BOOK_ID and bs2.STORE_ID = 2
order by NAME, KLD_QUANTITY, CHRK_QUANTITY, VARIANCE;