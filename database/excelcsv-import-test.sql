/*select region,count(id) as countofrow 
 from firstapp.excels
 group by region
 order by region
 limit 0,1000000;*/

-- truncate table  firstapp.excels;
 select * from firstapp.excels order by id desc limit 0, 1000030;
 select * from  firstapp.job_batches;
 -- truncate table firstapp.job_batches;
 select * from firstapp.jobs limit 0, 3000;
 -- truncate table firstapp.jobs;
 select * from firstapp.failed_jobs;
 -- create index FirstappIdxSalesOrderPriority ON firstapp.excels (OrderPriority, SalesChannel);
 -- select * from firstapp.excels order by SalesChannel,OrderPriority desc limit 0, 1000000;
 -- create view firstapp.testviewexcel as select * from firstapp.excels order by SalesChannel,OrderPriority desc limit 0, 1000000;
 -- CALL usp_testviewexcel;
 CALL usp_excels(0,1000000);
 -- list of storeprocedure
 select routine_name, routine_type,definer,created,security_type,SQL_Data_Access 
 from information_schema.routines where routine_type='PROCEDURE' and routine_schema='firstapp';