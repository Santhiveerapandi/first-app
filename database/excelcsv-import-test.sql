/*select region,count(id) as countofrow 
 from firstapp.excels
 group by region
 order by region
 limit 0,1000000;*/
 -- truncate table  firstapp.excels;
 select * from firstapp.excels limit 0, 1000000;
 select * from  firstapp.job_batches;
 -- truncate table firstapp.job_batches;
 select * from firstapp.jobs limit 0, 3000;
 -- truncate table firstapp.jobs;
 select * from firstapp.failed_jobs;