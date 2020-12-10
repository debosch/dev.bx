create table store
(
	ID int not null auto_increment,
	CITY varchar(500) not null,
	primary key(ID)
);

create table book_store
(
	BOOK_ID int not null,
	STORE_ID int not null,
	PRICE decimal (10, 2),
	QUANTITY int not null default 0,
	primary key (BOOK_ID, STORE_ID),
	foreign key FK_BOOK_STORE_STORE (STORE_ID) references store(ID)
		on update restrict
		on delete restrict,
	foreign key FK_BOOK_STORE_BOOK (BOOK_ID) references book(ID)
		on update restrict
		on delete restrict
);

insert into store (ID, CITY)
values (1, 'Калининград'),
       (2, 'Черняховск'),
       (3, 'Советск');

insert into book_store (BOOK_ID, STORE_ID, PRICE, QUANTITY)
select ID, 1, PRICE,QUANTITY from book;

insert into book_store (BOOK_ID, STORE_ID, PRICE, QUANTITY)
select ID, 2, PRICE,QUANTITY from book;

insert into book_store (BOOK_ID, STORE_ID, PRICE, QUANTITY)
select ID, 3, PRICE,QUANTITY from book;

alter table book
	drop column PRICE;

alter table book
	drop column QUANTITY;