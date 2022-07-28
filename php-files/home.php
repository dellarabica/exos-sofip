<!DOCTYPE html>
<html>

<head>
    <title>Système de fichiers</title>
    <link rel='stylesheet' href='style.css' />

</head>

<body>
    <h1>Liste de fichiers</h1>

    <ul>
        <?php
        $myfiles = array_slice(scandir('./files'), 2);
        $imgext = ['.png', '.jpg', '.gif'];
        $officeext = ['.docx', '.pptx', '.xlsx'];
        $scriptext = ['.php', '.asp'];
        $i = 0;
        function strpos_array($haystack, $needles)
        {
            if (is_array($needles)) {
                foreach ($needles as $str) {
                    if (is_array($str)) {
                        $pos = strpos_array($haystack, $str);
                    } else {
                        $pos = strpos($haystack, $str);
                    }
                    if ($pos !== FALSE) {
                        return $pos;
                    }
                }
            } else {
                return strpos($haystack, $needles);
            }
        }
        while ($i < count($myfiles)) {
            switch (true) {
                case strpos($myfiles[$i], '.txt'):
                    print("<li id='txt'>$myfiles[$i]</li>");
                    break;
                case strpos_array($myfiles[$i], $imgext):
                    print("<li><a href='files/$myfiles[$i]' target='_blank' rel='noopener noreferrer'><img src='files/$myfiles[$i]' id='img' /></a></li>");
                    break;
                case strpos_array($myfiles[$i], $scriptext):
                    print("<li id='script'>$myfiles[$i]</li>");
                    break;
                case strpos_array($myfiles[$i], $officeext):
                    print("<li id='office'>$myfiles[$i]</li>");
                    break;
                default:
                    print("<li>$myfiles[$i]</li>");
                    break;
            }

            $i++;
        }
        ?>
    </ul>

</body>

</html>