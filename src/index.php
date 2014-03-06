<?php
$title = 'Project Euler' ;
$stylesheets = array('style.css') ;
include($_SERVER['FILE_PREFIX'] . '/_core/preamble.php') ;
?>
    <div class="right">
      <h3>About this page</h3>
      <div class="blurb">
        <p>This is where I put my solutions (or work towards solutions) to Project Euler problems.  The problems are something I do in my spare time, so this will not be frequently updated.</p>
        
        <p>I tend to use python for solving these problems, because it's just so quick to write.</p>
        
        <p><a href="http://www.projecteuler.net">Project Euler</a></p>
      </div>
    </div>
    
    <div class="right">
      <h3><a href="http://projecteuler.net/problems">The problems</a></h3>
      <div class="blurb">
        <ul>
          <li><a href="1_9.php">Problems 1-9</a></li>
          <li><a href="10_19.php">Problems 10-19</a></li>
          <li><a href="20_29.php">Problems 20-29</a></li>
          <li><a href="30_39.php">Problems 30-39</a></li>
      </div>
    </div>
    
    <div class="right">
      <h3>Prime numbers</h3>
      <div class="blurb">
        <p>For many of these problems it's useful to have a list of prime numbers.  The primes below are listed are <a href="primes.txt">here</a>.</p>
        
        <p>The code for finding these primes is:</p>
        
        <pre class="euler">
flags = []
limit = 1000000
for i in range(0,limit):
    flags.append(i&gt;1)
for i in range(2,limit):
    if flags[i]==True:
        j = i
        while j&lt;limit:
            j = j+i
            if j&lt;limit:
                flags[j] = False
for i in range(2,limit):
    if flags[i]:
        print i
        </pre>
        
        <p>To read the primes into a list:</p>
        <pre class="euler">
primes_file = open('../primes/primes.txt')
primes = []
for p in primes_file.read().split('\n'):
    primes.append(int(p))
</pre>
        
      </div>
    </div>
    
    <div class="right">
      <h3>Stopwatch</h3>
      <div class="blurb">
        <p>Just for fun I time how long my solutions take.  I place the following snippets before and after the main code:</p>
        
        <pre class="euler">
import time
time_0 = time.time()
</pre>
        
        <pre class="euler">
time_1 = time.time()
print 'That took %.0fms'%(1000*(time_1-time_0))
</pre>
        
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