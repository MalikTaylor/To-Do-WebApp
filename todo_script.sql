ALTER TABLE task MODIFY COLUMN task_id INT AUTO_INCREMENT;


DELETE FROM task WHERE task_id = 0;

INSERT INTO task VALUES (NULL, "Add ability to remove ", false, CURDATE());

INSERT INTO usertask VALUES(0,1000);

SELECT user.user_name, user.user_id, task.task_name, task.task_id FROM usertask INNER JOIN user ON user.user_id = usertask.fk_user_id INNER JOIN task ON task.task_id = usertask.fk_task_id;

CREATE TABLE usertask(
	fk_user_id int,
    fk_task_id int,
    foreign key (fk_user_id) references user(user_id),
	foreign key (fk_task_id) references task(task_id)
);


drop table usertask;

