<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot5443700122:AAFYxyGEN3dCd66QVjaVGEmrZBBsmcFioBs/getupdates');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

$response = curl_exec($ch);

curl_close($ch);

$json = json_decode($response);

$messages = array_reverse($json->result);

// die(json_encode($messages));

$len = count($messages);

if ($len > 10) {
    $len = 10;
}


?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body class="">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Text</th>
                <th scope="col">Drive</th>
                <th scope="col">Index</th>
                <th scope="col">View</th>
            </tr>
        </thead>
        <tbody>
            <?php

            for ($i = 0; $i < $len; $i++) :
                $message = $messages[$i]
            ?>
                <tr>
                    <td> <?php echo $message->channel_post->sender_chat->id; ?></td>
                    <td> <?php echo $message->channel_post->text ?></td>
                    <td> <?php echo $message->channel_post->reply_markup->inline_keyboard[0][0]->url ?></td>
                    <td> <?php echo $message->channel_post->reply_markup->inline_keyboard[0][1]->url ?></td>
                    <td> <?php echo $message->channel_post->reply_markup->inline_keyboard[1][0]->url ?></td>
                    <td> <?php echo 'l' ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            setInterval(() => {
                location.reload()
            }, 3000);
        });
    </script>
</body>

</html>