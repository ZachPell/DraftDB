<html>
<body style="background-color:powderblue;">

<h1><center>NFL Draft Database</center></h1>

<form method="post">

    <center>
        <h3>Show All:</h3>
        <button type="submit" name="players">Players</button>
        <button type="submit" name="coaches">Coaches</button>
        <button type="submit" name="teams">NFL Teams</button>
        <button type="submit" name="colleges">Colleges</button>
    </center>

</form>

<h2>Insert a new player:</h2>

<form method="post"> 

    <label id="first">Player</label><br/>
    <input type="text" name="pname"><br/>

    <label id="first">Round</label><br/>
    <input type="text" name="round"><br/>

    <label id="first">Year</label><br/>
    <input type="text" name="year"><br/>

    <label id="first">Position</label><br/>
    <input type="text" name="pos"><br/>

    <label id="first">College</label><br/>
    <input type="text" name="college"><br/>

    <label id="first">Drafted by</label><br/>
    <input type="text" name="tname"><br/>

    <label id="first">Pro Bowls</label><br/>
    <input type="text" name="pro_bowls"><br/>

    <label id="first">Earnings</label><br/>
    <input type="text" name="earnings"><br/>

    <button type="submit" name="insert">Insert</button>

</form>

<br/>

<h2>Delete a player</h2>

<form method="post">

    <label id="first">Player to Delete</label><br/>
    <input type="text" name="pname"><br/>

    <button type="submit" name="delete">Delete</button>

</form>

</br>

<h2>Update Player's Earnings</h2>

<form method="post">

    <label id="first">Player to Update</label><br/>
    <input type="text" name="pname"><br/>
    
    <label id="first">New Earnings</label><br/>
    <input type="text" name="earnings"><br/>

    <button type="submit" name="update">Update</button>

</form>

</br>

<h2>How many positional players has your college produced?</h2>

<form method="post">

    <label id="first">Choose a position</label><br/>
    <input type="text" name="pos"><br/>
    
    <label id="first">Choose a college</label><br/>
    <input type="text" name="college"><br/>

    <button type="submit" name="pos_num">Find Out</button>

</form>
</br>


<h2>Draft picks produced by your coach</h2>

<form method="post">

    <label id="first">Choose a coach</label><br/>
    <input type="text" name="coach"><br/>

    <button type="submit" name="coachPicks">Find Out</button>

</form>
</br>

<h2>Does drafting players from your school equal more success for NFL teams?</h2>

<form method="post">

    <label id="first">Choose a college</label><br/>
    <input type="text" name="college"><br/>

    <button type="submit" name="draftSuccess">Find Out</button>

</form>


    
<?php
    $username = "root"; 
    $password = "cop4710"; 
    $host = "localhost"; 
    $dbname= "nfl_draft_db"; 
    $connect = mysqli_connect($host, $username, $password, $dbname); 

    if(isset($_POST['players']))
    {
        $query = "SELECT * FROM players"; 
        $result = mysqli_query($connect, $query);

        echo 
            "<center><table border='1'>
            <tr>
            <th>pid</th>
            <th>Round</th>
            <th>Year</th>
            <th>Team</th>
            <th>Player</th>
            <th>Pos</th>
            <th>College</th>
            <th>Pro Bowls</th>
            <th>Earnings</th>
            </tr>";

        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . $row['pid'] . "</td>";
            echo "<td>" . $row['round'] . "</td>";
            echo "<td>" . $row['year'] . "</td>";
            echo "<td>" . $row['tname'] . "</td>";
            echo "<td>" . $row['pname'] . "</td>";
            echo "<td>" . $row['pos'] . "</td>";
            echo "<td>" . $row['college'] . "</td>";
            echo "<td>" . $row['pro_bowls'] . "</td>";
            echo "<td>" . "$" . $row['earnings'] . "</td>";
            echo "</tr>";
        }
        echo "</table></center>";

        mysqli_free_result($result); 
    }
    
    if(isset($_POST['coaches']))
    {
        $query = "SELECT * FROM coaches"; 
        $result = mysqli_query($connect, $query);

        echo 
            "<center><table border='1'>
            <tr>
            <th>cid</th>
            <th>Name</th>
            <th>College</th>
            </tr>";

        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . $row['cid'] . "</td>";
            echo "<td>" . $row['cname'] . "</td>";
            echo "<td>" . $row['college'] . "</td>";
            echo "</tr>";
        }
        echo "</table></center>";

        mysqli_free_result($result); 
    }
    
    if(isset($_POST['teams']))
    {
        $query = "SELECT * FROM nfl_teams"; 
        $result = mysqli_query($connect, $query);

        echo 
            "<center><table border='1'>
            <tr>
            <th>Team</th>
            <th>Wins</th>
            <th>Championships</th>
            </tr>";

        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . $row['tname'] . "</td>";
            echo "<td>" . $row['wins'] . "</td>";
            echo "<td>" . $row['champs'] . "</td>";
            echo "</tr>";
        }
        echo "</table></center>";

        mysqli_free_result($result); 
    }
    
    if(isset($_POST['colleges']))
    {
        $query = "SELECT * FROM colleges"; 
        $result = mysqli_query($connect, $query);

        echo 
            "<center><table border='1'>
            <tr>
            <th>College</th>
            <th>Wins</th>
            <th>Championships</th>
            </tr>";

        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . $row['college'] . "</td>";
            echo "<td>" . $row['wins'] . "</td>";
            echo "<td>" . $row['champs'] . "</td>";
            echo "</tr>";
        }
        echo "</table></center>";

        mysqli_free_result($result); 
    }

    if(isset($_POST['insert']))
    {
        $query = "INSERT INTO players (pname, round, year, pos, college, tname, pro_bowls, earnings)
                 VALUES ('".$_POST["pname"]."','".$_POST["round"]."', '".$_POST["year"]."','".$_POST["pos"]."', 
                 '".$_POST["college"]."','".$_POST["tname"]."','".$_POST["pro_bowls"]."','".$_POST["earnings"]."')";
        
        mysqli_query($connect, $query);
    }


    if(isset($_POST['delete']))
    {
        $query= "DELETE FROM players
                 WHERE pname = '".$_POST["pname"]."'";
       
        mysqli_query($connect, $query);
    }
    
    if(isset($_POST['update']))
    {
        $query= "UPDATE players
                 SET earnings = '".$_POST['earnings']."'
                 WHERE pname = '".$_POST["pname"]."'";
       
        mysqli_query($connect, $query);
    }
    
    if(isset($_POST['pos_num']))
    {
        $query= "SELECT COUNT(pid) c
                 FROM players
                 WHERE pos = '".$_POST["pos"]."' AND college = '".$_POST["college"]."'";
       
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($result);
        
        echo htmlspecialchars($_POST['college']) . " has produced " . $row['c'] . " " . htmlspecialchars($_POST['pos']) . "'s";
    }

    if(isset($_POST['coachPicks']))
    {
        $query= "SELECT coaches.cname, coaches.college, players.pname, players.round
                 FROM players, coaches
                 WHERE coaches.cname = '".$_POST["coach"]."' AND coaches.college = players.college";
       
        $result = mysqli_query($connect, $query);
        
        echo 
            "<center><table border='1'>
            <tr>
            <th>Coach</th>
            <th>Player</th>
            <th>College</th>
            <th>Round</th>
            </tr>";

        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . $row['cname'] . "</td>";
            echo "<td>" . $row['pname'] . "</td>";
            echo "<td>" . $row['college'] . "</td>";
            echo "<td>" . $row['round'] . "</td>";
            echo "</tr>";
        }
        echo "</table></center>";

        mysqli_free_result($result);        
    }
    

    if(isset($_POST['draftSuccess']))
    {
        $query= "SELECT nfl_teams.tname, college, COUNT(pname) c, nfl_teams.wins
                 FROM players, nfl_teams
                 WHERE college = '".$_POST['college']."'
                 GROUP BY nfl_teams.tname, college";
       
        $result = mysqli_query($connect, $query);
        
        echo 
            "<center><table border='1'>
            <tr>
            <th>NFL Team</th>
            <th>College</th>
            <th>Count</th>
            <th>wins</th>
            </tr>";

        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . $row['tname'] . "</td>";
            echo "<td>" . $row['college'] . "</td>";
            echo "<td>" . $row['c'] . "</td>";
            echo "<td>" . $row['wins'] . "</td>";
            echo "</tr>";
        }
        echo "</table></center>";

        mysqli_free_result($result);        
    }
    
?>

</body>
</html>