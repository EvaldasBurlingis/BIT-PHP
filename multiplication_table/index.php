<?php 
    $number = 10;

    if(isset($_POST['submit'])){ 
        $number = intval($_POST['digit']);
    }

    if(isset($_POST['reset'])){ 
        $number = 9;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Daugybos lentelė</title>
</head>
<body class="min-h-screen tracking-tight">
    <main class="container mx-auto px-4 py-8">
        <div class="flex">
            <form method="POST" class="flex mb-8 justify-center">
                <label for="digit" class='text-sm border border-indigo-100 bg-indigo-100 py-2 px-4 rounded-l-md text-indigo-600'>Generate multiplication table for:</label>
                <input type="number" class="border border-indigo-100 px-4" name="digit" required />
                <input type="submit" name="submit" class="border border-indigo-600 bg-indigo-600 text-indigo-100 px-4 rounded-r-md hover:bg-indigo-700 mr-2" value="Generate">
                
            </form>
            
            <form method="POST">
                <input type="submit" name="reset" class="text-sm border border-indigo-600 bg-indigo-600 text-indigo-100 px-4 rounded-md hover:bg-indigo-700 py-2" value="Reset">
            </form>

        </div>

        <div>
            <h1 class="text-xl font-semibold tracking-tight mb-4 text-indigo-600">Multiplication table</h1>
            <div class="flex flex-wrap">
                <?php for ($i = 0; $i <= $number; $i++) : ?>
                    <div class="mr-8 mb-8 h-64 overflow-auto border border-gray-100 pl-4 pr-8 py-4 w-2/12">
                        <?php for ($x = 0; $x <= $number; $x++) : ?>
                            <p class="text-sm"><?php echo $i . ' x ' . $x . ' = ' . $i * $x; ?></p>
                        <?php endfor; ?>
                    </div>
                <?php endfor; ?>
            </div>

        </div>
    </main>
</body>
</html>