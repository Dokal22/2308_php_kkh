select emp_no, salary
from salaries
where to_date >= NOW()
  and salary >= 100000
group by emp_no;