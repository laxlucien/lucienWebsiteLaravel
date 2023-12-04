<nav class="flex-div">
            <div class="nav-left flex-div">
                <h3><a href="{{ url('/') }}">Lucien's Place For Things</a></h3>
            </div>
            <?php
                if(isset($_SESSION["username"])){
                    $loggedInUser = $_SESSION["username"];
                ?>
                <div class="nav-right flex-div">
                    <h3><a href="{{ url('about') }}">About</a></h3>
                    <h3><a href="{{ url('sudoku') }}" style="padding: 10px">Sudoku</a></h3>
                    <h3 style="color:white"><u><?php echo $_SESSION['username'] ?></u></h3>
                    <h3><a href="connect/logout.php" style="padding: 10px">Logout</a></h3>
                </div>
                <?php
                }else{
                ?>
                <div class="nav-right flex-div">
                    <h3><a href="{{ url('about') }}">About</a></h3>
                    <h3><a href="{{ url('sudoku') }}" style="padding: 10px">Sudoku</a></h3>
                    <h3><a href="{{ url('login') }}">Login</a></h3>
                    <h3><a href="{{ url('register') }}" style="padding: 10px">Register</a></h3>
                </div>
                <?php
                }
            ?>
        </nav>