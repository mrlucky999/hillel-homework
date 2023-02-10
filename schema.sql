CREATE DATABASE task_manager_db COLLATE utf8mb4_general_ci;

USE task_manager_db;

CREATE TABLE users (
    id INT unsigned auto_increment not null,
    reg_date DATETIME not null,
    email VARCHAR(20) not null,
    fname VARCHAR(20) not null,
    pass VARCHAR(20) not null,
    primary key (id),
    UNIQUE (email),
    INDEX (email, fname)
);

CREATE TABLE projects (
    id INT unsigned auto_increment not null,
    pname VARCHAR(20) not null,
    user_id int not null,
    primary key (id),
    INDEX (pname),
    FOREIGN KEY (user_id) references users(id) ON UPDATE NO ACTION
);

CREATE TABLE tasks (
    id INT unsigned auto_increment not null,
    createdAt DATETIME not null,
    tstatus enum('backlog', 'to-do', 'in-progress', 'done') DEFAULT 'backlog' not null,
    tname VARCHAR(20) not null,
    due_time DATETIME not null,
    primary key (id),
    INDEX (tname, id),
    FOREIGN KEY (tname) references users(fname) ON UPDATE NO ACTION,
    FOREIGN KEY (tname) references projects(pname) ON UPDATE NO ACTION
);
