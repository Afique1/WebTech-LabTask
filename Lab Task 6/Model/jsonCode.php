<?php
    function writeToJson()
    {
        if(file_exists('Json/data.json'))
        {
            $current_data = file_get_contents('Json/data.josn');
            $array_data = json_decode($current_data,true);
            $extra = array(
                'name'            =>     $_POST['name'],
                'email'           =>     $_POST['email'],
                'password'        =>     $_POST['password'],
                'gender'          =>     $_POST["gender"],  
                'dob'             =>     $_POST["dob"]);  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
            
            if(file_put_contents('Json/data.json',$final_data))
            {
                echo "Data inserted";
            }
        }
        else{echo "Json file doesn't exist.";}
    }

    function readFromJson($file)
    {
        $data = file_get_contents($file);
        $data = json_decode($data,true);
        return $data;
    }
?>