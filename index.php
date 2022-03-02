<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>PHP Form Builder demo</title>
    </head>
    <body>
        <h1>PHP Form Builder</h1>
        <p>Source: <a href="https://github.com/joshcanhelp/php-form-builder">PHP Form Builder repo</a></p>

        <?php
        include_once "FormBuilder.php";

        $new_form = new PhpFormBuilder();
        $new_form->set_att("method", "get");

        $new_form->add_input("Name:", [], "name");

        $new_form->add_input(
            "I am a: ",
            [
                "type" => "radio",
                "options" => [
                    "male" => "Male",
                    "female" => "Female",
                ],
            ],
            "gender"
        );

        $new_form->add_input(
            "What is your favorite color? ",
            [
                "type" => "color",
            ],
            "mycolor"
        );

        $new_form->add_input(
            "When is your birthday?",
            [
                "type" => "date",
            ],
            "mydate"
        );

        $new_form->build_form();

        if (isset($_GET["submit"])) {
            $name = $_GET["name"];
            $gender = $_GET["gender"];
            $color = $_GET["mycolor"];
            $birth_day = $_GET["mydate"];

            echo "$name is a $gender[0] that loves the hex color $color, he was born in $birth_day";
        }

        $quiz_form = new PhpFormBuilder();

        $quiz_form->set_att("method", "post");

        $quiz_form->add_input(
            "I am a: ",
            [
                "type" => "checkbox",
                "options" => [
                    "Javascript" => "Javascript",
                    "Python" => "Python",
                    "C++" => "C++",
                    "Java" => "Java",
                    "C" => "C",
                ],
            ],
            "mylang"
        );

        $quiz_form->add_input(
            "What languages do you use?",
            [
                "type" => "submit",
                "value" => "lets go!",
            ],
            "mylang_submit"
        );

        $quiz_form->build_form();

        if (isset($_POST["mylang_submit"])) {
            $data = $_POST["mylang"];
            $lit = sizeof($data) > 1 ? "are" : "is";
            $lit2 = sizeof($data) > 1 ? "languages" : "language";
            if (!in_array("Javascript", $data)) {
                echo implode(", ", $data) .
                    " $lit cool but, Javascript is still the best!";
            } else {
                echo "Yup! " . implode(", ", $data) . "$lit cool $lit2!";
            }
        }
        ?>
    </body>
</html>
