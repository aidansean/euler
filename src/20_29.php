<?php
$title = 'Project Euler | Problems 20-29' ;
$stylesheets = array('style.css') ;
include($_SERVER['FILE_PREFIX'] . '/_core/preamble.php') ;
?>
    <div class="right">
      <div class="blurb">
        <table class="euler_links">
          <tbody>
            <tr>
              <td class="euler_link_left"  ><a href="10_19.php">&larr; Problems 10-19</a></td>
              <td class="euler_link_center"><a href="index.php">Back</a></td>
              <td class="euler_link_right" ><a href="30_39.php">Problems 30-39 &rarr;</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="right">
      <h3><a href="http://projecteuler.net/problem=20">Problem 20</a></h3>
      <div class="blurb">
        <blockquote>
        \(n!\) means \(n \times (n  1) \times \ldots \times 3 \times 2 \times 1\)<br />
<br />
For example, \(10! = 10 \times 9 \times \ldots \times 3 \times 2 \times 1 = 3628800\),<br />
and the sum of the digits in the number \(10!\) is \(3 + 6 + 2 + 8 + 8 + 0 + 0 = 27\).<br />
<br />
Find the sum of the digits in the number \(100!\)
        </blockquote>
        <p>Solution: This is just a variant on problem 16.</p>
        <pre class="euler">
import math
n = math.factorial(100)
sum = 0
while n > 0:
    d = n%10
    sum += d
    n = (n-d)/10
print sum
</pre>
        <p>Answer: 648</p>
        <p>Time: 1ms</p>
      </div>
    </div>
    
    <div class="right">
      <h3><a href="http://projecteuler.net/problem=28">Problem 28</a></h3>
      <div class="blurb">
        <blockquote>
        Starting with the number 1 and moving to the right in a clockwise direction a 5 by 5 spiral is formed as follows:<br />

<pre>
21 22 23 24 25
20  7  8  9 10
19  6  1  2 11
18  5  4  3 12
17 16 15 14 13
</pre>

It can be verified that the sum of the numbers on the diagonals is 101.<br />

What is the sum of the numbers on the diagonals in a 1001 by 1001 spiral formed in the same way?
        </blockquote>
        <p>Solution: For a spiral of side \(2n+1\) here are four diagonals of length \(n\) to consider, plus the \(1\) in the centre.  Each turn of the spiral increases the distance around by \(8\), so the differences increase by \(8\) with each turn.  For the spiral \(1, 3, 13, 31\ldots\) the differences between the terms go as \(8n-6\), so the \(n^{th}\) term is \(T_n=1+\sum_{i=1}^n (8i-6) = 1+4n(n+1)-6n = 4n^2-2n+1\).  The expressions for all the diagonals are by extension \(T_n=1+4n^2+(4-d)n\) where \(d=[6,4,2,0]\).  The sum of the \(n^{th}\) diagonals are then \(16n^2+4n+4\).  These then need to be summed from, not forgetting that \(1\) only appears once:</p>
        \[T_n = 1 + \sum_{m=1}^n \left( 16m^2 + 4m + 4 \right) \]
        \[ = 1 + 4n + 2n(n+1) + \left(16n^3+24n^2+16n\right)/3 \]
        <pre class="euler">
def T_n(n):
    return 1 + 4*n + 2*n*(n+1) + 16*n*(2*n*n+3*n+1)/6
print T_n(500)
        </pre>
        <p>Answer: 669171001</p>
        <p>Time: &lt;1ms</p>
      </div>
    </div>
    
    <!--
    <div class="right">
      <h3><a href="http://projecteuler.net/problem=">Problem </a></h3>
      <div class="blurb">
        <blockquote>
        </blockquote>
        <p>Solution:</p>
        <pre class="euler"></pre>
        <p>Answer: </p>
        <p>Time: </p>
      </div>
    </div>
    -->
<?php foot() ; ?>