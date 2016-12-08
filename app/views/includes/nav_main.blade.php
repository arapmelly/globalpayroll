 <nav class="navbar-default navbar-static-side" role="navigation">
    
           


            <div class="sidebar-collapse">

                <ul class="nav" id="side-menu">

                    @if(Confide::user()->user_type != 'teller')

                    <li>
                        <a href="{{ URL::to('/') }}"><i class="fa fa-users fa-fw"></i> Employees</a>
                    </li>

                     <li>
                        <a href="{{ URL::to('payments/allowance') }}"><i class="fa fa-list fa-fw"></i> Allowances</a>
                    </li>

                     <li>
                        <a href="{{ URL::to('payments/deduction') }}"><i class="fa fa-list fa-fw"></i> Deductions</a>
                    </li>


                    <li>
                        <a href="{{ URL::to('payrolls/create') }}"><i class="fa fa-th fa-fw"></i> Process</a>
                    </li>

                    

                   
                    
                    @endif

                    

                   
                    

                    
                   
                    


                     


                    




                     


                    
                     
                    
                    
                </ul>
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        <!-- /.navbar-static-side -->