<?php
    
    function messagesAll() : array{
		$sql = "SELECT * FROM test ORDER BY id DESC";
		$query = dbQuery($sql);
		return $query->fetchAll();
	}
    
    function messagesAdd(array $fields) : bool{
        $sql = "INSERT test (dateStart, name, email, seasonPrice, sale, relativeSale) 
        VALUES 
        (:date_input, :name, :email, :cost, :saleForRange, :relativesaleForRange)";
        dbQuery($sql, $fields);
        return true;
    }

    function messagesValidate(array $fields) : array{
        $errors = [];

        $days = floor((abs(strtotime(substr($fields['date_input'], 12, 22)) - strtotime(substr($fields['date_input'], 0, 10))))/86400);

        if(mb_strlen($fields['date_input']) < 20){
            $errors[] = 'Выберите 2 даты!';
        }

        $textLen = mb_strlen($fields['name'], 'UTF-8');
        if($textLen < 2){
            $errors[] = 'Имя от 2 символов!';
        }

        if (filter_var($fields['email'], FILTER_VALIDATE_EMAIL) === false)
        {
            $errors[] = 'Неправильная почта!';
        }

        if($fields['saleForRange'] > ($days * $fields['cost'])){
            $errors[] = 'Неправильная скидка!';
        }

        if($fields['relativesaleForRange'] > 100){
            $errors[] = 'Неправильная скидка!';
        }

        $fields['date_input'] = htmlspecialchars($fields['date_input']);
        $fields['name'] = htmlspecialchars($fields['name']);
        $fields['email'] = htmlspecialchars($fields['email']);
        return $errors;
    }