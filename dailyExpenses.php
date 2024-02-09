<!-- Expenses section start -->

<section id="daily-expenses" class="bg-dark text-light">
    <div class="container">
        <div class="row">
                <h3 class="text-center display-4 my-4">Daily Expenses</h3>
                <div class="col-md-6 overflow-auto">
                <table class="table table-bordered table-dark text-center">
                    <thead>
                        <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Date</th>
                        <th scope="col">Employee</th>
                        <th scope="col">Purpose</th>
                        <th scope="col">Ammount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sqlShow = "SELECT * FROM `tb_dailyexpenses` WHERE Date = '$toDate'";
                        $sqlShowResult = mysqli_query($conn,$sqlShow);
                        $i=1;
                        while($row = mysqli_fetch_array($sqlShowResult)){?>
                        <tr>
                            <th scope="row"><?php echo $i;?></th>
                            <td><?php echo $row['Date'];?></td>
                            <?php $re2Id = $row['EId'];
                            $sql2Data = "SELECT EMP.E_Name FROM `tb_employeeinfo` AS EMP WHERE Id = '$re2Id'";
                            $sql2Result = mysqli_query($conn,$sql2Data);
                            foreach($sql2Result as $val){?>
                                <td><?php echo $val['E_Name'];?></td>
                            <?php } ?>
                            <?php $Pid = $row['PurposeId'];
                            $sqlPData = "SELECT PP.P_Name FROM tb_purpose AS PP WHERE Id = '$Pid'";
                            $sqlPResult = mysqli_query($conn,$sqlPData);
                            foreach($sqlPResult as $Purpos)
                            {?>
                                <td><?php echo $Purpos['P_Name']; ?></td>
                            <?php }
                            ?>
                            <td><?php echo '৳'.$row['Amount'].'/-';?></td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <form action="moneyTransectionBK?id=<?php echo $Id;?>" method="POST">
                    <div class="form-group">
                        <label for="employee">Select Employee</label>
                        <select name="cbxEmployeeEX" require class="form-control" id="employee">
                            <?php 
                                $sqlData = "SELECT * FROM `tb_employeeinfo` WHERE E_Status = 1";
                                $sqlResult = mysqli_query($conn,$sqlData); ?>
                            <option selected disabled>Select Employee</option>
                            <?php while($row = mysqli_fetch_array($sqlResult)){?>
                            <option value="<?php echo $row['Id']; ?>"><?php echo $row['E_Name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="purpose">Select your purpose</label>
                        <select name="cbxPurposeEX" require class="form-control" id="purpose">
                            <?php 
                                $sqlData = "SELECT * FROM `tb_purpose`";
                                $sqlResult = mysqli_query($conn,$sqlData); ?>
                            <option selected disabled>Select purpose name</option>
                            <?php while($row = mysqli_fetch_array($sqlResult)){?>
                            <option value="<?php echo $row['Id']; ?>"><?php echo $row['P_Name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ammountEX">Enter Total Amount *</label>
                        <input type="number" name="txtAmountEX" class="form-control" id="ammountEX" placeholder="Enter your amount">
                    </div>
                    <div class="form-group">
                        <label for="RemarkEX">Remark (Optional)</label>
                        <textarea class="form-control" name="txtRemarkEX" id="RemarkEX" rows="3" placeholder="Enter your Remark"></textarea>
                    </div>
                    <button name="btnExpenses" type="submit" class="button-30 mt-3">Expenses</button>
                    <button name="btnCancel" type="submit" class="button-30 mt-3">Cancel</button>
                    <button name="btnOther" type="submit" class="button-30 mt-3">More</button>
                </form>
            </div>
            <div class="">
                <?php
                    $sqlTotalAmount = "SELECT SUM(Amount) FROM tb_dailyexpenses WHERE Date = '$toDate'";
                    $sqlToalAmountResult = mysqli_query($conn,$sqlTotalAmount);
                    while($row = mysqli_fetch_array($sqlToalAmountResult)){?>
                        <h2>Total Expenses: <?php echo $row['SUM(Amount)'];?>/-</h2>
                <?php    }
                    ?>
            </div>
        </div>
    </div>
</section>

<!-- Expenses section end -->