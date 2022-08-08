ALTER TABLE task AUTO_INCREMENT = 8;

DELETE FROM task where task_id = 14;
DELETE FROM task WHERE task_id = 1054;

INSERT INTO task VALUES (9, "Test", false, CURDATE());


INSERT INTO usertask VALUES(0,9);

SELECT user.user_name, user.user_id, task.task_name, task.task_id FROM usertask INNER JOIN user ON user.user_id = usertask.fk_user_id INNER JOIN task ON task.task_id = usertask.fk_task_id;

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

SELECT * FROM task;

drop table usertask;

