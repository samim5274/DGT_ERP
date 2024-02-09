<!-- bank diposit section start -->

<section id="bank-diposit" class="bg-secondary text-light">
    <div class="container">
        <div class="row">
                <h3 class="text-center display-4 my-4">Bank Diposit Section</h3>
            <div class="col-md-6">
                <form action="moneyTransectionBK?id=<?php echo $Id;?>" method="POST">
                    <select name="cbxEmployeeD" require class="form-control" id="">
                        <?php 
                            $sqlData = "SELECT * FROM `tb_employeeinfo` WHERE E_Status = 1";
                            $sqlResult = mysqli_query($conn,$sqlData); ?>
                        <option selected disabled>Select Employee</option>
                        <?php while($row = mysqli_fetch_array($sqlResult)){?>
                        <option value="<?php echo $row['Id']; ?>"><?php echo $row['E_Name']; ?></option>
                        <?php } ?>
                    </select>
                    <div class="form-group mt-3">
                        <select name="cbxAccount" require class="form-control" id="">
                            <?php 
                                $sqlData = "SELECT * FROM `tb_bankdetail`";
                                $sqlResult = mysqli_query($conn,$sqlData); ?>
                            <option selected disabled>Select Bank Account</option>
                            <?php while($row = mysqli_fetch_array($sqlResult)){?>
                            <option value="<?php echo $row['AccountNumber']; ?>"><?php echo $row['AccountNumber']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ammountt">Enter Total Amount *</label>
                        <input type="number" name="txtAmount" class="form-control" id="ammountt" placeholder="Enter your amount">
                    </div>
                    <div class="form-group">
                        <label for="Remarkk">Remark (Optional)</label>
                        <textarea class="form-control" name="txtRemark" id="Remarkk" rows="3" placeholder="Enter your Remark"></textarea>
                    </div>
                    <button name="btnDiposit" type="submit" class="button-30 mt-3">Diposit</button>
                    <button name="btnCancel" type="submit" class="button-30 mt-3">Cancel</button>
                    <button name="btnOther" type="submit" class="button-30 mt-3">More</button>
                </form>
            </div>
            <div class="col-md-6 overflow-auto">
                <!-- <h3 class="text-center">Sent Money Data show</h3> -->
                <table class="table table-bordered table-dark text-center">
                    <thead>
                        <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Date</th>
                        <th scope="col">Employee</th>
                        <th scope="col">Account Number</th>
                        <th scope="col">Ammount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sqlShow = "SELECT * FROM tb_dipositandwithdrawdetail WHERE TransectionType = 1 AND Date = '$toDate'";
                        $sqlShowResult = mysqli_query($conn,$sqlShow);
                        $i=1;
                        while($row = mysqli_fetch_array($sqlShowResult)){?>
                        <tr>
                            <th scope="row"><?php echo $i;?></th>
                            <td><?php echo $row['Date'];?></td>
                            <?php $re2Id = $row['EId'];?>
                            <?php
                            $sql2Data = "SELECT EMP.E_Name FROM `tb_employeeinfo` AS EMP WHERE Id = '$re2Id'";
                            $sql2Result = mysqli_query($conn,$sql2Data);
                            foreach($sql2Result as $val){?>
                                <td><?php echo $val['E_Name'];?></td>
                            <?php } ?>
                            <td><?php echo $row['AccountNumber']; ?></td>
                            <td><?php echo '৳'.$row['Amount'].'/-';?></td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
            <div class="text-end">
                <?php
                    $sqlTotalAmount = "SELECT SUM(Amount) FROM tb_dipositandwithdrawdetail WHERE TransectionType = 1 AND Date = '$toDate'";
                    $sqlToalAmountResult = mysqli_query($conn,$sqlTotalAmount);
                    while($row = mysqli_fetch_array($sqlToalAmountResult)){?>
                        <h2>Total Diposit: <?php echo $row['SUM(Amount)'];?>/-</h2>
                <?php    }
                    ?>
            </div>
        </div>
    </div>
</section>

<!-- bank diposit section end -->


<!-- bank withdraw section start -->

<section id="bank-withdraw" class="bg-dark text-light">
    <div class="container">
        <div class="row">
                <h3 class="text-center display-4 my-4">Bank Withdraw Section</h3>
                <div class="col-md-6 overflow-auto">
                <!-- <h3 class="text-center">Sent Money Data show</h3> -->
                <table class="table table-bordered table-dark text-center">
                    <thead>
                        <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Date</th>
                        <th scope="col">Employee</th>
                        <th scope="col">Account Number</th>
                        <th scope="col">Ammount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sqlShow = "SELECT * FROM tb_dipositandwithdrawdetail WHERE TransectionType = 2 AND Date = '$toDate'";
                        $sqlShowResult = mysqli_query($conn,$sqlShow);
                        $i=1;
                        while($row = mysqli_fetch_array($sqlShowResult)){?>
                        <tr>
                            <th scope="row"><?php echo $i;?></th>
                            <td><?php echo $row['Date'];?></td>
                            <?php $re2Id = $row['EId'];?>
                            <?php
                            $sql2Data = "SELECT EMP.E_Name FROM `tb_employeeinfo` AS EMP WHERE Id = '$re2Id'";
                            $sql2Result = mysqli_query($conn,$sql2Data);
                            foreach($sql2Result as $val){?>
                                <td><?php echo $val['E_Name'];?></td>
                            <?php } ?>
                            <td><?php echo $row['AccountNumber']; ?></td>
                            <td><?php echo '৳'.$row['Amount'].'/-';?></td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6 mt-4">
            <form action="moneyTransectionBK?id=<?php echo $Id;?>" method="POST">
                    <select name="cbxEmployeeW" require class="form-control" id="">
                        <?php 
                            $sqlData = "SELECT * FROM `tb_employeeinfo` WHERE E_Status = 1";
                            $sqlResult = mysqli_query($conn,$sqlData); ?>
                        <option selected disabled>Select Employee</option>
                        <?php while($row = mysqli_fetch_array($sqlResult)){?>
                        <option value="<?php echo $row['Id']; ?>"><?php echo $row['E_Name']; ?></option>
                        <?php } ?>
                    </select>
                    <div class="form-group mt-3">
                        <select name="cbxAccountW" require class="form-control" id="">
                            <?php 
                                $sqlData = "SELECT * FROM `tb_bankdetail`";
                                $sqlResult = mysqli_query($conn,$sqlData); ?>
                            <option selected disabled>Select Bank Account</option>
                            <?php while($row = mysqli_fetch_array($sqlResult)){?>
                            <option value="<?php echo $row['AccountNumber']; ?>"><?php echo $row['AccountNumber']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ammountW">Enter Total Amount *</label>
                        <input type="number" name="txtAmountW" class="form-control" id="ammountW" placeholder="Enter your amount">
                    </div>
                    <div class="form-group">
                        <label for="RemarkW">Remark (Optional)</label>
                        <textarea class="form-control" name="txtRemarkW" id="RemarkW" rows="3" placeholder="Enter your Remark"></textarea>
                    </div>
                    <button name="btnWithdraw" type="submit" class="button-30 mt-3">Withdraw</button>
                    <button name="btnCancel" type="submit" class="button-30 mt-3">Cancel</button>
                    <button name="btnOther" type="submit" class="button-30 mt-3">More</button>
                </form>
            </div>
            <div class="">
                <?php
                    $sqlTotalAmount = "SELECT SUM(Amount) FROM tb_dipositandwithdrawdetail WHERE TransectionType = 2 AND Date = '$toDate'";
                    $sqlToalAmountResult = mysqli_query($conn,$sqlTotalAmount);
                    while($row = mysqli_fetch_array($sqlToalAmountResult)){?>
                        <h2>Total Diposit: <?php echo $row['SUM(Amount)'];?>/-</h2>
                <?php    }
                    ?>
            </div>
        </div>
    </div>
</section>

<!-- bank withdraw section end -->


<!-- bank to Bank transection section start -->

<section id="bank-to-bank" class="bg-secondary text-light">
    <div class="container">
        <div class="row">
                <h3 class="text-center display-4 my-4">Bank to Bank-transection</h3>
                <div class="col-md-12 my-4">
                    <div class="overflow-auto2">
                        <table class="table table-bordered text-light text-center">
                            <thead>
                                <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Account</th>
                                <th scope="col">Diposit</th>
                                <th scope="col">Withdraw</th>
                                <th scope="col">Balence</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sqlShow = "SELECT AccountNumber,SUM(Amount) FROM `tb_dipositandwithdrawdetail`  WHERE
                                TransectionType = 1 GROUP BY AccountNumber";
                                $sqlShowResult = mysqli_query($conn,$sqlShow);
                                
                                $sqlShow2 = "SELECT AccountNumber,SUM(Amount) FROM `tb_dipositandwithdrawdetail`  WHERE
                                TransectionType = 2 GROUP BY AccountNumber";
                                $sqlShowResult2 = mysqli_query($conn,$sqlShow2);
                                

                                $i=1;
                                while($row = mysqli_fetch_array($sqlShowResult) AND $row2 = mysqli_fetch_array($sqlShowResult2)){?>
                                <tr>
                                    <th scope="row"><?php echo $i;?></th>
                                    <td><?php echo $row['AccountNumber'];?></td>
                                    <td><?php echo $diposit = '৳ '.$row['SUM(Amount)'].'/-';?></td>
                                    <td><?php echo $withdraw = '৳ '.$row2['SUM(Amount)'].'/-';?></td>
                                    <?php $row['SUM(Amount)'] - $row2['SUM(Amount)'];?>
                                    <td><?php echo '৳ '.$row['SUM(Amount)'] - $row2['SUM(Amount)'].'/-';?></td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <div class="col-md-6">
                <form action="moneyTransectionBK?id=<?php echo $Id;?>" method="POST">
                    <div class="from-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="To">To</label>
                                <select name="cbxAccount1" require class="form-control" id="To">
                                    <?php 
                                        $sqlData = "SELECT * FROM `tb_bankdetail`";
                                        $sqlResult = mysqli_query($conn,$sqlData); ?>
                                    <option selected disabled>Select To Bank Account</option>
                                    <?php while($row = mysqli_fetch_array($sqlResult)){?>
                                    <option value="<?php echo $row['AccountNumber']; ?>"><?php echo $row['AccountNumber']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="From">From</label>
                                <select name="cbxAccount2" require class="form-control" id="From">
                                    <?php 
                                        $sqlData = "SELECT * FROM `tb_bankdetail`";
                                        $sqlResult = mysqli_query($conn,$sqlData); ?>
                                    <option selected disabled>Select From Bank Account</option>
                                    <?php while($row = mysqli_fetch_array($sqlResult)){?>
                                    <option value="<?php echo $row['AccountNumber']; ?>"><?php echo $row['AccountNumber']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="emp">Employee</label>
                        <select name="cbxEmployeeTT" require class="form-control" id="emp">
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
                        <label for="ammountt3">Enter Total Amount *</label>
                        <input type="number" name="txtAmount3" class="form-control" id="ammountt3" placeholder="Enter your amount">
                    </div>
                    <div class="form-group">
                        <label for="Remarkk3">Remark (Optional)</label>
                        <textarea class="form-control" name="txtRemark3" id="Remarkk3" rows="3" placeholder="Enter your Remark"></textarea>
                    </div>
                    <button name="btnTransfer" type="submit" class="button-30 mt-3">Transfer</button>
                    <button name="btnCancel" type="submit" class="button-30 mt-3">Cancel</button>
                    <button name="btnOther" type="submit" class="button-30 mt-3">More</button>
                </form>
            </div>
            <div class="col-md-6">
                <div class="overflow-auto">
                    <table class="table table-bordered table-dark text-center">
                        <thead>
                            <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Date</th>
                            <th scope="col">To</th>
                            <th scope="col">From</th>
                            <th scope="col">Ammount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sqlShow = "SELECT * FROM `tb_banktobanktransectiondetail` WHERE Date = '$toDate'";
                            $sqlShowResult = mysqli_query($conn,$sqlShow);
                            $i=1;
                            while($row = mysqli_fetch_array($sqlShowResult)){?>
                            <tr>
                                <th scope="row"><?php echo $i;?></th>
                                <td><?php echo $row['Date'];?></td>
                                <td><?php echo $row['ToAccount']; ?></td>
                                <td><?php echo $row['FromAccount']; ?></td>
                                <td><?php echo '৳'.$row['Amount'].'/-';?></td>
                            </tr>
                            <?php $i++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-end">
                <?php
                    $sqlTotalAmount = "SELECT SUM(Amount) FROM tb_banktobanktransectiondetail WHERE Date = '$toDate'";
                    $sqlToalAmountResult = mysqli_query($conn,$sqlTotalAmount);
                    while($row = mysqli_fetch_array($sqlToalAmountResult)){?>
                        <h2>Total Bank Transfer: <?php echo $row['SUM(Amount)'];?>/-</h2>
                <?php    }
                    ?>
            </div> 
        </div>
    </div>
</section>

<!-- bank to Bank transection section end -->