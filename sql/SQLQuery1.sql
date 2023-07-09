create table StaffPersonals (
	StaffID int primary key identity(1,1),
	StaffName varchar(50) not null,
	Address varchar(50) not null,
	Phone int not null,
	Appointment text not null
	);

create table Catalogs (
	CategoryID int primary key identity(1,1),
	CategoryName varchar(50) not null
	);


create table Books (
	BookID int primary key identity(1,1),
	BookName varchar(50) not null,
	AuthorID int not null foreign key references Authors(AuthorID),
	CategoryID int not null foreign key references Catalogs(CategoryID),
	Pages int not null,
	PurchasePrice float not null
	);


create table Authors (
	AuthorID int primary key identity(1,1),
	AuthorName varchar(50) not null,
	Country varchar(50) not null,
	LifeStatus varchar(10) not null
	);
	

create table LibraryMembers (
	MemberID int primary key identity(1,1),
	MemberName varchar(50) not null,
	MembershipDate text not null,
	Address varchar(50) not null,
	Phone int not null
	);


create table BookIssues (
	IssueNo int primary key identity(1,1),
	BookID int not null foreign key references Books(BookID),
	MemberID int not null foreign key references LibraryMembers(MemberID),
	StaffID int not null foreign key references StaffPersonals(StaffID),
	IssueDate text not null,
	ReturnDate text not null,
	Fine float
	);