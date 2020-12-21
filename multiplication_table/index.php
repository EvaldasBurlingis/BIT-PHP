<?php 
    $number = 9;

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
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title>Multiplication table</title>
</head>
<body class="min-h-screen h-full tracking-tight relative" x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-cloak>
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
            <h1 class="text-xl font-semibold tracking-tight mb-4 text-indigo-600">Multiplication table till: <?php echo $number; ?></h1>
            <div class="flex flex-wrap">
                <?php for ($i = 0; $i <= $number; $i++) : ?>
                    <button
                        class="w-24 h-24 border border-gray-400 mr-2 mb-2 hover:bg-gray-100 hover:text-indigo-600 text-4xl text-gray-700 font-sans font-bold rounded-md cursor-pointer"
                        @click="showModal = true"
                        onclick="showMultiplicationTableInModal(<?php echo $i; ?>)">
                        <?php echo $i; ?>
                    </button>       
                <?php endfor; ?>
            </div>   
        </div>
        
        

        <!-- Modal overlay -->
        <div 
            x-show="showModal" 
            @click="showModal = !showModal"
            class="absolute top-0 left-0 h-full w-full py-64 flex items-start justify-center"
            style="background: rgba(255,255,255,0.7)"
            id="modal" 
        >     
                  
        </div>
        <script>
            const modal = document.querySelector('#modal');
            
            function showMultiplicationTableInModal(num) {
                modal.innerHTML = `
                    <div class="bg-indigo-600 text-white rounded-md w-1/3 p-8">
                        <div class="overflow-y-auto h-64">
                            <?php for ($x = 0; $x <= $number; $x++) : ?>
                                <p class="text-lg font-semibold"><?php echo $x; ?> x ${num} = ${num * <?php echo $x; ?>}</p>
                            <?php endfor; ?>
                        <div>
                    </div>
                `;
            }
        </script>
    </main>
</body>
</html>
