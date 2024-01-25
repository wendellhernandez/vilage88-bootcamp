<?php
    $users = array( 
        array('cardholder_name'=> "Michael Choi", 'cvc' => 123, 'acc_num' => '1234 5678 9876 5432'),
        array('cardholder_name'=> "John Supsupin",'cvc' => 789, 'acc_num' => '0001 1200 1500 1510'),
        array('cardholder_name'=> "KB Tonel", 'cvc' => 567, 'acc_num' => '4568 456 123 5214'),
        array('cardholder_name'=> "Mark Guillen", 'cvc' => 345, 'acc_num' => '1234 1234 123 123'),
        array('cardholder_name'=> "Purr howl", 'cvc' => 123, 'acc_num' => '1234 1235 1234 1231'),
        array('cardholder_name'=> "stop scratching", 'cvc' => 456, 'acc_num' => '123 1238 1231 123'),
        array('cardholder_name'=> "lick sellotape", 'cvc' => 789, 'acc_num' => '1234 1238 1231 123'),
        array('cardholder_name'=> "fall asleep", 'cvc' => 134, 'acc_num' => '1235 1236 1239 1231'),
        array('cardholder_name'=> "leave hair", 'cvc' => 321, 'acc_num' => '1236 1237 1230 1231'),
    );
?>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Name in uppercase</th>
        <th>Account Num</th>
        <th>CVC Num</th>
        <th>Full Account</th>
        <th>Length of full account</th>
        <th>is valid</th>
    </tr>

<?php for($i=0; $i<count($users); $i++){ ?>
    <tr <?= (($i + 1)%3 === 0) ? ' style="background: #444"' : '' ?> >
        <td><?= $i + 1 ?></td>
        <td><?= $users[$i]['cardholder_name'] ?></td>
        <td><?= strtoupper($users[$i]['cardholder_name']) ?></td>
        <td><?= $users[$i]['acc_num'] ?></td>
        <td><?= $users[$i]['cvc'] ?></td>
        <td><?= $users[$i]['acc_num'] . ' ' . $users[$i]['cvc'] ?></td>
        <td><?= preg_match_all( "/[0-9]/", $users[$i]['acc_num'] . $users[$i]['cvc']) ?></td>
        <td><?= (preg_match_all( "/[0-9]/", $users[$i]['acc_num'] . $users[$i]['cvc']) === 19) ? 'yes' : 'no' ?></td>
    </tr>
<?php } ?>
</table>

