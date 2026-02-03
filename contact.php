<!DOCTYPE html>
<html lang="en">
    <?php
        include("head.php")
    ?>
<body>
    <div class = "container">
        
        <?php include("header.php") ?>
        
        <?php include("nav.php") ?>

        <main>
            <h1>
                Contact 
            </h1>
        
        <div class="formContainer">
            <form id="contact-form-id" method="Post" action="contact-form-process.php">
                <label for="name">Your Name</label>    
                <input type="text" name="name" id="name" required>
                <label for="email">Your Email</label>
                <br>
                <input type="email" name="email" id="email" required>
                <br>
                <label for="message">Your Message</label>
                <textarea name="message" id="message" rows="6" maxlength="3000" required></textarea>
                <input type="submit" id="sendButton"></button>
            </form>
        </div>

        </main>

        <?php include("footer.php") ?>
    </div>

</body>
</html>