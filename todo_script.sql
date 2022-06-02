USE heroku_d22a93da00c438d;

ALTER TABLE task AUTO_INCREMENT = 0;
SHOW TABLE STATUS LIKE 'task';

SELECT user.user_name, user.user_id, task.task_name, task.task_id FROM usertask INNER JOIN user ON user.user_id = usertask.fk_user_id INNER JOIN task ON task.task_id = usertask.fk_task_id;
SELECT task_id, task.task_name FROM usertask INNER JOIN task ON usertask.fk_task_id = task.task_id;

UPDATE task SET task_name = "Add user authentication" WHERE task_id = 5;

CREATE TABLE task(
	task_id int not null AUTO_INCREMENT,
    task_name VARCHAR(100),
    is_done Boolean,
    create_date DATE,
    primary key(task_id)
);

CREATE TABLE usertask(
	fk_user_id int,
    fk_task_id int,
    foreign key (fk_user_id) references user(user_id),
	foreign key (fk_task_id) references task(task_id)
);

 CREATE TABLE completed(
	user_id INT,
	task_id INT Primary key,
    task_name VARCHAR(100),
    create_date date
 );
 
 TRUNCATE usertask; 
 
 INSERT INTO completed SELECT user.user_id, task.task_id, task.task_name, task.create_date FROM usertask INNER JOIN user ON user.user_id = usertask.fk_user_id INNER JOIN task ON task.task_id = usertask.fk_task_id WHERE task.task_id = 6;

INSERT INTO usertask values (0, 3);

SELECT * FROM task;
select * from user;
SELECT * FROM completed;
SELECT * FROM usertask;





