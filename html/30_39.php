<?php
$title = 'Project Euler | Problems 30-39' ;
$stylesheets = array('style.css') ;
include($_SERVER['FILE_PREFIX'] . '/_core/preamble.php') ;
?>
    <div class="right">
      <div class="blurb">
        <table class="euler_links">
          <tbody>
            <tr>
              <td class="euler_link_left"  ><a href="20_29.php">&larr; Problems 20-29</a></td>
              <td class="euler_link_center"><a href="index.php">Back</a></td>
              <td class="euler_link_right" ></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="right">
      <h3><a href="http://projecteuler.net/problem=30">Problem 30</a></h3>
      <div class="blurb">
        <blockquote>
        Surprisingly there are only three numbers that can be written as the sum of fourth powers of their digits:<br />
<br />
\[1634 = 14 + 64 + 34 + 44\]
\[8208 = 84 + 24 + 04 + 84\]
\[9474 = 94 + 44 + 74 + 44\]
As \(1 = 1^4\) is not a sum it is not included.<br />
<br />
The sum of these numbers is \(1634 + 8208 + 9474 = 19316\).<br />
<br />
Find the sum of all the numbers that can be written as the sum of fifth powers of their digits.
        </blockquote>
        <p>Solution: I used brute force to get this answer.  Note that \(9^5=531441\) so we only need to check numbers with up to \(6\) digits long.</p>
        <pre class="euler">
from math import pow
p = 5
n = 0
for i1 in range(0,10):
    for i2 in range(0,10):
        for i3 in range(0,10):
            for i4 in range(0,10):
                for i5 in range(0,10):
                    for i6 in range(0,10):
                        sum =       pow(i1,p)
                        sum = sum + pow(i2,p)
                        sum = sum + pow(i3,p)
                        sum = sum + pow(i4,p)
                        sum = sum + pow(i5,p)
                        sum = sum + pow(i6,p)
                        
                        num =       i1*pow(10,0)
                        num = num + i2*pow(10,1)
                        num = num + i3*pow(10,2)
                        num = num + i4*pow(10,3)
                        num = num + i5*pow(10,4)
                        num = num + i6*pow(10,5)
                        
                        if sum == num and num>1:
                            print num
                            n = n+num
print n
</pre>
        <p>Answer: 443839</p>
        <p>Time: 3590ms</p>
      </div>
    </div>
    
    <div class="right">
      <h3><a href="http://projecteuler.net/problem=33">Problem 33</a></h3>
      <div class="blurb">
        <blockquote>
        The fraction \(49/98\) is a curious fraction, as an inexperienced mathematician in attempting to simplify it may incorrectly believe that \(49/98 = 4/8\), which is correct, is obtained by cancelling the \(9\)s.<br />
<br />
We shall consider fractions like, \(30/50 = 3/5\), to be trivial examples.<br />
<br />
There are exactly four non-trivial examples of this type of fraction, less than one in value, and containing two digits in the numerator and denominator.<br />
<br />
If the product of these four fractions is given in its lowest common terms, find the value of the denominator.
        </blockquote>
        <p>Solution: I've come across this piece of trivia before.  The fractions are: \(16/64\), \(19/95\), \(49/98\), and \(26/65\).</p>
        <p>Answer: 100</p>
      </div>
    </div>
    
    <div class="right">
      <h3><a href="http://projecteuler.net/problem=34">Problem 34</a></h3>
      <div class="blurb">
        <blockquote>
        145 is a curious number, as \(1! + 4! + 5! = 1 + 24 + 120 = 145\).<br />
<br />
Find the sum of all numbers which are equal to the sum of the factorial of their digits.<br />
<br />
Note: as \(1! = 1\) and \(2! = 2\) are not sums they are not included.
        </blockquote>
        <p>Solution: Note that \(9!=362880\) so we only need to check numbers with up to \(7\) digits long. Also note that all factorials greater than \(4!\) end in \(0\), so if the number ends in something other than \(0\) it must contain a digit less than \(5\).  Not exactly an elegant solution, or a fast one, I just used brute force.</p>
        <pre class="euler">
from math import factorial as f

n = 0
for i1 in range(0,10):
    for i2 in range(0,10):
        for i3 in range(0,10):
            for i4 in range(0,10):
                for i5 in range(0,10):
                    for i6 in range(0,10):
                        for i7 in range(0,10):
                            
                            sum = 0
                            num = 0
                            for i in [i1,i2,i3,i4,i5,i6,i7]:
                                sum = sum + f(i)
                            if i7 == 0:
                                sum = sum - 1
                                if i6 == 0:
                                    sum = sum - 1
                                    if i5 == 0:
                                        sum = sum - 1
                                        if i4 == 0:
                                           sum = sum - 1
                                           if i3 == 0:
                                                sum = sum - 1
                                                if i2 == 0:
                                                    sum = sum - 1
                            num =       i1*pow(10,0)
                            num = num + i2*pow(10,1)
                            num = num + i3*pow(10,2)
                            num = num + i4*pow(10,3)
                            num = num + i5*pow(10,4)
                            num = num + i6*pow(10,5)
                            num = num + i7*pow(10,6)
                            if sum == num and num>2:
                                n = n+num
print n
</pre>
        <p>Answer: 40730</p>
        <p>Time: 52227ms</p>
      </div>
    </div>
    
    <div class="right">
      <h3><a href="http://projecteuler.net/problem=35">Problem 35</a></h3>
      <div class="blurb">
        <blockquote>
        The number, \(197\), is called a circular prime because all rotations of the digits: 197, 971, and 719, are themselves prime.<br />
<br />
There are thirteen such primes below \(100\): \(2, 3, 5, 7, 11, 13, 17, 31, 37, 71, 73, 79\), and \(97\).<br />
<br />
How many circular primes are there below one million?
        </blockquote>
        <p>Solution: Eliminating primes greater than \(10\) that contain the digits \(0, 2, 4, 5, 6, 8\) and then searching through the list of primes gives the solution in a reasonable amount of time.</p>
        <pre class="euler">
primes_file = open('primes.txt')
primes = []
for p in primes_file.read().split('\n'):
    primes.append(p)

def get_permutations(n):
    l = len(n)
    ps = []
    for i in range(0,l):
        ps.append(n[i:l]+n[0:i])
    return ps

n = 0
for p in primes:
    if int(p) &gt; 10:
        if '0' in p:
            continue
        if '2' in p:
            continue
        if '4' in p:
            continue
        if '5' in p:
            continue
        if '6' in p:
            continue
        if '8' in p:
            continue
    perms = get_permutations(p)
    success = True
    for perm in perms:
        if perm not in primes:
            success = False
            break
    if success:
        n = n + 1
print n
</pre>
        <p>Answer: 55</p>
        <p>Time: 2081ms</p>
      </div>
    </div>

    <div class="right">
      <h3><a href="http://projecteuler.net/problem=37">Problem 37</a></h3>
      <div class="blurb">
        <blockquote>
        The number \(3797\) has an interesting property. Being prime itself, it is possible to continuously remove digits from left to right, and remain prime at each stage: \(3797, 797, 97\), and \(7\). Similarly we can work from right to left: \(3797, 379, 37\), and \(3\).<br />
<br />
Find the sum of the only eleven primes that are both truncatable from left to right and right to left.<br />
<br />
NOTE: \(2, 3, 5\), and \(7\) are not considered to be truncatable primes.
        </blockquote>
        <p>Solution: This is just a rehash of problem 35, except this time we're allowed to have a leading \(2\) or \(5\).</p>
        <pre class="euler">
primes_file = open('primes.txt')
primes = []
for p in primes_file.read().split('\n'):
    primes.append(p)

def get_subprimes(n):
    l = len(n)
    s = []
    for i in range(0,l):
        part_2 = n[0:i]
        part_1 = n[i:l]
        s.append(part_1)
        if i&gt;0:
            s.append(part_2)
    return s

n = 0
for p in primes:
    if int(p) &lt; 10:
        continue
    if '0' in p:
            continue
        if '2' in p[1:]:
            continue
        if '4' in p:
            continue
        if '5' in p[1:]:
            continue
        if '6' in p:
            continue
        if '8' in p:
            continue
    perms = get_subprimes(p)
    success = True
    for perm in perms:
        if perm not in primes:
            success = False
            break
    if success:
        n = n + int(p)
        print p
print n
</pre>
        <p>Answer: 748317</p>
        <p>Time: 2737ms</p>
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