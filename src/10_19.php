<?php
$title = 'Project Euler | Problems 10-19' ;
$stylesheets = array('style.css') ;
include($_SERVER['FILE_PREFIX'] . '/_core/preamble.php') ;
?>
    <div class="right">
      <div class="blurb">
        <table class="euler_links">
          <tbody>
            <tr>
              <td class="euler_link_left"  ><a href="1_9.php">&larr; Problems 1-9</a></td>
              <td class="euler_link_center"><a href="index.php">Back</a></td>
              <td class="euler_link_right" ><a href="20_29.php">Problems 20-29 &rarr;</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="right">
      <h3><a href="http://projecteuler.net/problem=10">Problem 10</a></h3>
      <div class="blurb">
        <blockquote>
        The sum of the primes below \(10\) is \(2 + 3 + 5 + 7 = 17\).<br />
        <br />
        Find the sum of all the primes below two million.
        </blockquote>
        <p>Solution:</p>
        <pre class="euler">
primes_file = open('../primes/primes.txt')
sum = 0
for p in primes_file.read().split('\n'):
    if int(p) > 2000000:
        break
    sum += int(p)
print sum
</pre>
        <p>Answer: 142913828922</p>
        <p>Time: 314ms</p>
      </div>
    </div>
    
    <div class="right">
      <h3><a href="http://projecteuler.net/problem=11">Problem 11</a></h3>
      <div class="blurb">
        <blockquote>
        In the \(20\times 20\) grid below, four numbers along a diagonal line have been marked in red.<br />
        <br />
        <pre>
08 02 22 97 38 15 00 40 00 75 04 05 07 78 52 12 50 77 91 08
49 49 99 40 17 81 18 57 60 87 17 40 98 43 69 48 04 56 62 00
81 49 31 73 55 79 14 29 93 71 40 67 53 88 30 03 49 13 36 65
52 70 95 23 04 60 11 42 69 24 68 56 01 32 56 71 37 02 36 91
22 31 16 71 51 67 63 89 41 92 36 54 22 40 40 28 66 33 13 80
24 47 32 60 99 03 45 02 44 75 33 53 78 36 84 20 35 17 12 50
32 98 81 28 64 23 67 10 26 38 40 67 59 54 70 66 18 38 64 70
67 26 20 68 02 62 12 20 95 63 94 39 63 08 40 91 66 49 94 21
24 55 58 05 66 73 99 26 97 17 78 78 96 83 14 88 34 89 63 72
21 36 23 09 75 00 76 44 20 45 35 14 00 61 33 97 34 31 33 95
78 17 53 28 22 75 31 67 15 94 03 80 04 62 16 14 09 53 56 92
16 39 05 42 96 35 31 47 55 58 88 24 00 17 54 24 36 29 85 57
86 56 00 48 35 71 89 07 05 44 44 37 44 60 21 58 51 54 17 58
19 80 81 68 05 94 47 69 28 73 92 13 86 52 17 77 04 89 55 40
04 52 08 83 97 35 99 16 07 97 57 32 16 26 26 79 33 27 98 66
88 36 68 87 57 62 20 72 03 46 33 67 46 55 12 32 63 93 53 69
04 42 16 73 38 25 39 11 24 94 72 18 08 46 29 32 40 62 76 36
20 69 36 41 72 30 23 88 34 62 99 69 82 67 59 85 74 04 36 16
20 73 35 29 78 31 90 01 74 31 49 71 48 86 81 16 23 57 05 54
01 70 54 71 83 51 54 69 16 92 33 48 61 43 52 01 89 19 67 48
</pre>
        The product of these numbers is \(26 \times 63 \times 78 \times 14 = 1788696\).</p>
        <br />
        What is the greatest product of four adjacent numbers in the same direction (up, down, left, right, or diagonally) in the 2020 grid?
        </blockquote>
        <p>Solution:</p>
        <pre class="euler">
numbers = [
[ 8,  2, 22, 97, 38, 15,  0, 40,  0, 75,  4,  5,  7, 78, 52, 12, 50, 77, 91,  8],
[49, 49, 99, 40, 17, 81, 18, 57, 60, 87, 17, 40, 98, 43, 69, 48,  4, 56, 62,  0],
[81, 49, 31, 73, 55, 79, 14, 29, 93, 71, 40, 67, 53, 88, 30,  3, 49, 13, 36, 65],
[52, 70, 95, 23,  4, 60, 11, 42, 69, 24, 68, 56,  1, 32, 56, 71, 37,  2, 36, 91],
[22, 31, 16, 71, 51, 67, 63, 89, 41, 92, 36, 54, 22, 40, 40, 28, 66, 33, 13, 80],
[24, 47, 32, 60, 99,  3, 45,  2, 44, 75, 33, 53, 78, 36, 84, 20, 35, 17, 12, 50],
[32, 98, 81, 28, 64, 23, 67, 10, 26, 38, 40, 67, 59, 54, 70, 66, 18, 38, 64, 70],
[67, 26, 20, 68,  2, 62, 12, 20, 95, 63, 94, 39, 63,  8, 40, 91, 66, 49, 94, 21],
[24, 55, 58,  5, 66, 73, 99, 26, 97, 17, 78, 78, 96, 83, 14, 88, 34, 89, 63, 72],
[21, 36, 23,  9, 75,  0, 76, 44, 20, 45, 35, 14,  0, 61, 33, 97, 34, 31, 33, 95],
[78, 17, 53, 28, 22, 75, 31, 67, 15, 94,  3, 80,  4, 62, 16, 14,  9, 53, 56, 92],
[16, 39,  5, 42, 96, 35, 31, 47, 55, 58, 88, 24,  0, 17, 54, 24, 36, 29, 85, 57],
[86, 56,  0, 48, 35, 71, 89,  7,  5, 44, 44, 37, 44, 60, 21, 58, 51, 54, 17, 58],
[19, 80, 81, 68,  5, 94, 47, 69, 28, 73, 92, 13, 86, 52, 17, 77,  4, 89, 55, 40],
[ 4, 52,  8, 83, 97, 35, 99, 16,  7, 97, 57, 32, 16, 26, 26, 79, 33, 27, 98, 66],
[88, 36, 68, 87, 57, 62, 20, 72,  3, 46, 33, 67, 46, 55, 12, 32, 63, 93, 53, 69],
[ 4, 42, 16, 73, 38, 25, 39, 11, 24, 94, 72, 18,  8, 46, 29, 32, 40, 62, 76, 36],
[20, 69, 36, 41, 72, 30, 23, 88, 34, 62, 99, 69, 82, 67, 59, 85, 74,  4, 36, 16],
[20, 73, 35, 29, 78, 31, 90,  1, 74, 31, 49, 71, 48, 86, 81, 16, 23, 57,  5, 54],
[ 1, 70, 54, 71, 83, 51, 54, 69, 16, 92, 33, 48, 61, 43, 52,  1, 89, 19, 67, 48]
]

largest = 1788696
for i in range(0,20):
    for j in range(0,16):
        d1 = numbers[i][j+0]
        d2 = numbers[i][j+1]
        d3 = numbers[i][j+2]
        d4 = numbers[i][j+3]
        p = d1*d2*d3*d4
        if p>largest:
            largest = p
        
        d1 = numbers[j+0][i]
        d2 = numbers[j+1][i]
        d3 = numbers[j+2][i]
        d4 = numbers[j+3][i]
        p = d1*d2*d3*d4
        if p>largest:
            largest = p
        
        if i<16:
            d1 = numbers[i+0][j+0]
            d2 = numbers[i+1][j+1]
            d3 = numbers[i+2][j+2]
            d4 = numbers[i+3][j+3]
            p = d1*d2*d3*d4
            if p>largest:
                largest = p
            
            if j>2:
                d1 = numbers[i+0][j-0]
                d2 = numbers[i+1][j-1]
                d3 = numbers[i+2][j-2]
                d4 = numbers[i+3][j-3]
                p = d1*d2*d3*d4
                if p>largest:
                    largest = p
print largest
</pre>
        <p>Answer: 70600674</p>
        <p>Time: 2ms</p>
      </div>
    </div>
    
    <div class="right">
      <h3><a href="http://projecteuler.net/problem=12">Problem 12</a></h3>
      <div class="blurb">
        <blockquote>
        The sequence of triangle numbers is generated by adding the natural numbers. So the 7th triangle number would be \(1 + 2 + 3 + 4 + 5 + 6 + 7 = 28\). The first ten terms would be:<br />
        <br />
        \(1, 3, 6, 10, 15, 21, 28, 36, 45, 55, \ldots\)<br />
        <br />
        Let us list the factors of the first seven triangle numbers:<br />
        <br />
        \( 1: 1\)<br />
        \( 3: 1,3\)<br />
        \( 6: 1,2,3,6\)<br />
        \(10: 1,2,5,10\)<br />
        \(15: 1,3,5,15\)<br />
        \(21: 1,3,7,21\)<br />
        \(28: 1,2,4,7,14,28\)<br />
        We can see that \(28\) is the first triangle number to have over five divisors.<br />
        <br />
        What is the value of the first triangle number to have over five hundred divisors?<br />
        </blockquote>
        <p>Solution:</p>
        <pre class="euler">
def nFactors(x):
    nF = 0
    for i in range(2,x/2):
        nF = nF + (x%i==0)
    return nF

i = 0
while True:
    i += 1
    A = i
    B = i+1
    nFA = nFactors(A)
    nFB = nFactors(B)
    if nFA*nFB >= 500:
        print A*B/2
        break
</pre>
        <p>Answer: 76576500</p>
        <p>Time: 16576ms</p>
      </div>
    </div>
    
    <div class="right">
      <h3><a href="http://projecteuler.net/problem=13">Problem 13</a></h3>
      <div class="blurb">
        <blockquote>
        Work out the first ten digits of the sum of the following one-hundred 50-digit numbers.
<pre>
37107287533902102798797998220837590246510135740250
46376937677490009712648124896970078050417018260538
74324986199524741059474233309513058123726617309629
91942213363574161572522430563301811072406154908250
23067588207539346171171980310421047513778063246676
89261670696623633820136378418383684178734361726757
28112879812849979408065481931592621691275889832738
44274228917432520321923589422876796487670272189318
47451445736001306439091167216856844588711603153276
70386486105843025439939619828917593665686757934951
62176457141856560629502157223196586755079324193331
64906352462741904929101432445813822663347944758178
92575867718337217661963751590579239728245598838407
58203565325359399008402633568948830189458628227828
80181199384826282014278194139940567587151170094390
35398664372827112653829987240784473053190104293586
86515506006295864861532075273371959191420517255829
71693888707715466499115593487603532921714970056938
54370070576826684624621495650076471787294438377604
53282654108756828443191190634694037855217779295145
36123272525000296071075082563815656710885258350721
45876576172410976447339110607218265236877223636045
17423706905851860660448207621209813287860733969412
81142660418086830619328460811191061556940512689692
51934325451728388641918047049293215058642563049483
62467221648435076201727918039944693004732956340691
15732444386908125794514089057706229429197107928209
55037687525678773091862540744969844508330393682126
18336384825330154686196124348767681297534375946515
80386287592878490201521685554828717201219257766954
78182833757993103614740356856449095527097864797581
16726320100436897842553539920931837441497806860984
48403098129077791799088218795327364475675590848030
87086987551392711854517078544161852424320693150332
59959406895756536782107074926966537676326235447210
69793950679652694742597709739166693763042633987085
41052684708299085211399427365734116182760315001271
65378607361501080857009149939512557028198746004375
35829035317434717326932123578154982629742552737307
94953759765105305946966067683156574377167401875275
88902802571733229619176668713819931811048770190271
25267680276078003013678680992525463401061632866526
36270218540497705585629946580636237993140746255962
24074486908231174977792365466257246923322810917141
91430288197103288597806669760892938638285025333403
34413065578016127815921815005561868836468420090470
23053081172816430487623791969842487255036638784583
11487696932154902810424020138335124462181441773470
63783299490636259666498587618221225225512486764533
67720186971698544312419572409913959008952310058822
95548255300263520781532296796249481641953868218774
76085327132285723110424803456124867697064507995236
37774242535411291684276865538926205024910326572967
23701913275725675285653248258265463092207058596522
29798860272258331913126375147341994889534765745501
18495701454879288984856827726077713721403798879715
38298203783031473527721580348144513491373226651381
34829543829199918180278916522431027392251122869539
40957953066405232632538044100059654939159879593635
29746152185502371307642255121183693803580388584903
41698116222072977186158236678424689157993532961922
62467957194401269043877107275048102390895523597457
23189706772547915061505504953922979530901129967519
86188088225875314529584099251203829009407770775672
11306739708304724483816533873502340845647058077308
82959174767140363198008187129011875491310547126581
97623331044818386269515456334926366572897563400500
42846280183517070527831839425882145521227251250327
55121603546981200581762165212827652751691296897789
32238195734329339946437501907836945765883352399886
75506164965184775180738168837861091527357929701337
62177842752192623401942399639168044983993173312731
32924185707147349566916674687634660915035914677504
99518671430235219628894890102423325116913619626622
73267460800591547471830798392868535206946944540724
76841822524674417161514036427982273348055556214818
97142617910342598647204516893989422179826088076852
87783646182799346313767754307809363333018982642090
10848802521674670883215120185883543223812876952786
71329612474782464538636993009049310363619763878039
62184073572399794223406235393808339651327408011116
66627891981488087797941876876144230030984490851411
60661826293682836764744779239180335110989069790714
85786944089552990653640447425576083659976645795096
66024396409905389607120198219976047599490197230297
64913982680032973156037120041377903785566085089252
16730939319872750275468906903707539413042652315011
94809377245048795150954100921645863754710598436791
78639167021187492431995700641917969777599028300699
15368713711936614952811305876380278410754449733078
40789923115535562561142322423255033685442488917353
44889911501440648020369068063960672322193204149535
41503128880339536053299340368006977710650566631954
81234880673210146739058568557934581403627822703280
82616570773948327592232845941706525094512325230608
22918802058777319719839450180888072429661980811197
77158542502016545090413245809786882778948721859617
72107838435069186155435662884062257473692284509516
20849603980134001723930671666823555245252804609722
53503534226472524250874054075591789781264330331690
</pre>
        </blockquote>
        <p>Solution:</p>
        <pre class="euler">
import math

numbers = [37107287533902102798797998220837590246510135740250,
46376937677490009712648124896970078050417018260538,
74324986199524741059474233309513058123726617309629,
91942213363574161572522430563301811072406154908250,
23067588207539346171171980310421047513778063246676,
89261670696623633820136378418383684178734361726757,
28112879812849979408065481931592621691275889832738,
44274228917432520321923589422876796487670272189318,
47451445736001306439091167216856844588711603153276,
70386486105843025439939619828917593665686757934951,
62176457141856560629502157223196586755079324193331,
64906352462741904929101432445813822663347944758178,
92575867718337217661963751590579239728245598838407,
58203565325359399008402633568948830189458628227828,
80181199384826282014278194139940567587151170094390,
35398664372827112653829987240784473053190104293586,
86515506006295864861532075273371959191420517255829,
71693888707715466499115593487603532921714970056938,
54370070576826684624621495650076471787294438377604,
53282654108756828443191190634694037855217779295145,
36123272525000296071075082563815656710885258350721,
45876576172410976447339110607218265236877223636045,
17423706905851860660448207621209813287860733969412,
81142660418086830619328460811191061556940512689692,
51934325451728388641918047049293215058642563049483,
62467221648435076201727918039944693004732956340691,
15732444386908125794514089057706229429197107928209,
55037687525678773091862540744969844508330393682126,
18336384825330154686196124348767681297534375946515,
80386287592878490201521685554828717201219257766954,
78182833757993103614740356856449095527097864797581,
16726320100436897842553539920931837441497806860984,
48403098129077791799088218795327364475675590848030,
87086987551392711854517078544161852424320693150332,
59959406895756536782107074926966537676326235447210,
69793950679652694742597709739166693763042633987085,
41052684708299085211399427365734116182760315001271,
65378607361501080857009149939512557028198746004375,
35829035317434717326932123578154982629742552737307,
94953759765105305946966067683156574377167401875275,
88902802571733229619176668713819931811048770190271,
25267680276078003013678680992525463401061632866526,
36270218540497705585629946580636237993140746255962,
24074486908231174977792365466257246923322810917141,
91430288197103288597806669760892938638285025333403,
34413065578016127815921815005561868836468420090470,
23053081172816430487623791969842487255036638784583,
11487696932154902810424020138335124462181441773470,
63783299490636259666498587618221225225512486764533,
67720186971698544312419572409913959008952310058822,
95548255300263520781532296796249481641953868218774,
76085327132285723110424803456124867697064507995236,
37774242535411291684276865538926205024910326572967,
23701913275725675285653248258265463092207058596522,
29798860272258331913126375147341994889534765745501,
18495701454879288984856827726077713721403798879715,
38298203783031473527721580348144513491373226651381,
34829543829199918180278916522431027392251122869539,
40957953066405232632538044100059654939159879593635,
29746152185502371307642255121183693803580388584903,
41698116222072977186158236678424689157993532961922,
62467957194401269043877107275048102390895523597457,
23189706772547915061505504953922979530901129967519,
86188088225875314529584099251203829009407770775672,
11306739708304724483816533873502340845647058077308,
82959174767140363198008187129011875491310547126581,
97623331044818386269515456334926366572897563400500,
42846280183517070527831839425882145521227251250327,
55121603546981200581762165212827652751691296897789,
32238195734329339946437501907836945765883352399886,
75506164965184775180738168837861091527357929701337,
62177842752192623401942399639168044983993173312731,
32924185707147349566916674687634660915035914677504,
99518671430235219628894890102423325116913619626622,
73267460800591547471830798392868535206946944540724,
76841822524674417161514036427982273348055556214818,
97142617910342598647204516893989422179826088076852,
87783646182799346313767754307809363333018982642090,
10848802521674670883215120185883543223812876952786,
71329612474782464538636993009049310363619763878039,
62184073572399794223406235393808339651327408011116,
66627891981488087797941876876144230030984490851411,
60661826293682836764744779239180335110989069790714,
85786944089552990653640447425576083659976645795096,
66024396409905389607120198219976047599490197230297,
64913982680032973156037120041377903785566085089252,
16730939319872750275468906903707539413042652315011,
94809377245048795150954100921645863754710598436791,
78639167021187492431995700641917969777599028300699,
15368713711936614952811305876380278410754449733078,
40789923115535562561142322423255033685442488917353,
44889911501440648020369068063960672322193204149535,
41503128880339536053299340368006977710650566631954,
81234880673210146739058568557934581403627822703280,
82616570773948327592232845941706525094512325230608,
22918802058777319719839450180888072429661980811197,
77158542502016545090413245809786882778948721859617,
72107838435069186155435662884062257473692284509516,
20849603980134001723930671666823555245252804609722,
53503534226472524250874054075591789781264330331690]

sum = 0
for n in numbers:
    sum += n
print math.floor(sum/pow(10,math.floor(math.log10(sum))-9))
</pre>
        <p>Answer: 5537376230</p>
        <p>Time: 1ms</p>
      </div>
    </div>
    
    <div class="right">
      <h3><a href="http://projecteuler.net/problem=14">Problem 14</a></h3>
      <div class="blurb">
        <blockquote>
        The following iterative sequence is defined for the set of positive integers:<br />
<br />
\(n &rarr; n/2\) (\(n\) is even)<br />
\(n &rarr; 3n + 1\) (\(n\) is odd)<br />
<br />
Using the rule above and starting with \(13\), we generate the following sequence:<br />
<br />
\(13 &rarr; 40 &rarr; 20 &rarr; 10 &rarr; 5 &rarr; 16 &rarr; 8 &rarr; 4 &rarr; 2 &rarr; 1\)<br />
It can be seen that this sequence (starting at \(13\) and finishing at \(1\)) contains \(10\) terms. Although it has not been proved yet (Collatz Problem), it is thought that all starting numbers finish at 1.<br />
<br />
Which starting number, under one million, produces the longest chain?<br />
<br />
NOTE: Once the chain starts the terms are allowed to go above one million.
        </blockquote>
        <p>Solution:</p>
        <pre class="euler">
results = []
def step(x, n, start):
    if x%2==0:
        if x/2&lt;start:
            return n + results[x/2]
        else:
            return step(x/2, n+1, start)
    else:
        return step(3*x+1, n+1, start)

results.append(0)
results.append(0)
highest_result = 0
highest_seed   = 0
for i in range(2,1000000):
    answer = step(i,0,i)
    results.append(answer)
    if answer > highest_result:
        highest_result = answer
        highest_seed = i

print highest_seed</pre>
        <p>Answer: 837799</p>
        <p>Time: 3238ms</p>
      </div>
    </div>
    
    <div class="right">
      <h3><a href="http://projecteuler.net/problem=15">Problem 15</a></h3>
      <div class="blurb">
        <blockquote>Starting in the top left corner of a \(2\times 2\) grid, there are \(6\) routes (without backtracking) to the bottom right corner.<br />
<img src="http://projecteuler.net/project/images/p_015.gif" width="208px" height="151px" alt="Paths through the lattice" /><br />
How many routes are there through a \(20\times 20\) grid?
        </blockquote>
        <p>Solution: This is a simple matter of combinatorics.  There are \(40\) steps to be taken, \(20\) across and \(20\) down, in any order, so the solution is \(40!/20!20!\).</p>
        <pre class="euler">
from math import factorial
print factorial(40)/(factorial(20)*factorial(20))
</pre>
        <p>Answer: 137846528820</p>
        <p>Time: &lt;1ms</p>
      </div>
    </div>
    
    <div class="right">
      <h3><a href="http://projecteuler.net/problem=16">Problem 16</a></h3>
      <div class="blurb">
        <blockquote>
\(2^{15} = 32768\) and the sum of its digits is \(3 + 2 + 7 + 6 + 8 = 26\).<br />
<br />
What is the sum of the digits of the number \(2^{1000}\)?
        </blockquote>
        <p>Solution: There are quicker ways to do this, but I prefer the mathematical approach.</p>
        <pre class="euler">
n = pow(2,1000)
sum = 0
while n > 0:
    d = n%10
    sum += d
    n = (n-d)/10
print sum
</pre>
        <p>Answer: 1366</p>
        <p>Time: 1ms</p>
      </div>
    </div>
    
    <div class="right">
      <h3><a href="http://projecteuler.net/problem=17">Problem 17</a></h3>
      <div class="blurb">
        <blockquote>
If the numbers \(1\) to \(5\) are written out in words: one, two, three, four, five, then there are \(3 + 3 + 5 + 4 + 4 = 19\) letters used in total.<br />
<br />
If all the numbers from \(1\) to \(1000\) (one thousand) inclusive were written out in words, how many letters would be used?<br />
<br />
NOTE: Do not count spaces or hyphens. For example, \(342\) (three hundred and forty-two) contains \(23\) letters and \(115\) (one hundred and fifteen) contains \(20\) letters. The use of "and" when writing out numbers is in compliance with British usage.
        </blockquote>
        <p>Solution: Not a pretty solution, but one that works.</p>
        <pre class="euler">
digits = []
digits.append('one'  )
digits.append('two'  )
digits.append('three')
digits.append('four' )
digits.append('five' )
digits.append('six'  )
digits.append('seven')
digits.append('eight')
digits.append('nine' )

tens = []
tens.append('twenty' )
tens.append('thirty' )
tens.append('forty'  )
tens.append('fifty'  )
tens.append('sixty'  )
tens.append('seventy')
tens.append('eighty' )
tens.append('ninety' )

hundred  = 'hundredand'
hundred2 = 'hundred'
thousand = 'onethousand'

teens = []
teens.append('ten'      )
teens.append('eleven'   )
teens.append('twelve'   )
teens.append('thirteen' )
teens.append('fourteen' )
teens.append('fifteen'  )
teens.append('sixteen'  )
teens.append('seventeen')
teens.append('eighteen' )
teens.append('nineteen' )

n = 0
for d in digits:
    n += len(d)
for t in teens:
    n += len(t)
for t in tens:
    n += len(t)
    for d in digits:
        n += len(t)
        n += len(d)
for h in digits:
    n += len(h)
    n += len(hundred2)
    for d in digits:
        n += len(h)
        n += len(hundred)
        n += len(d)
    for t in teens:
        n += len(h)
        n += len(hundred)
        n += len(t)
    for t in tens:
        n += len(h)
        n += len(hundred)
        n += len(t)
        for d in digits:
            n += len(h)
            n += len(hundred)
            n += len(t)
            n += len(d)
n += len(thousand)
print n
 </pre>
        <p>Answer: 21124</p>
        <p>Time: 1ms</p>
      </div>
    </div>
    
    <div class="right">
      <h3><a href="http://projecteuler.net/problem=18">Problem 18</a></h3>
      <div class="blurb">
        <blockquote>
        By starting at the top of the triangle below and moving to adjacent numbers on the row below, the maximum total from top to bottom is \(23\).<br />
<br />
<pre>
3
7 4
2 4 6
8 5 9 3
</pre>
That is, \(3 + 7 + 4 + 9 = 23\).<br />
<br />
Find the maximum total from top to bottom of the triangle below:<br />
<br />
<pre>
75
95 64
17 47 82
18 35 87 10
20 04 82 47 65
19 01 23 75 03 34
88 02 77 73 07 63 67
99 65 04 28 06 16 70 92
41 41 26 56 83 40 80 70 33
41 48 72 33 47 32 37 16 94 29
53 71 44 65 25 43 91 52 97 51 14
70 11 33 28 77 73 17 78 39 68 17 57
91 71 52 38 17 14 91 43 58 50 27 29 48
63 66 04 68 89 53 67 30 73 16 69 87 40 31
04 62 98 27 23 09 70 98 73 93 38 53 60 04 23
</pre>
<br />
NOTE: As there are only \(16384\) routes, it is possible to solve this problem by trying every route. However, Problem 67, is the same challenge with a triangle containing one-hundred rows; it cannot be solved by brute force, and requires a clever method! ;o)
        </blockquote>
        <p>Solution: Ignore the description: start from the bottom and work up!  Keep track of the largest sum as you move up.</p>
        <pre class="euler">
triangle = [
[75],
[95, 64],
[17, 47, 82],
[18, 35, 87, 10],
[20,  4, 82, 47, 65],
[19,  1, 23, 75,  3, 34],
[88,  2, 77, 73,  7, 63, 67],
[99, 65,  4, 28, 06, 16, 70, 92],
[41, 41, 26, 56, 83, 40, 80, 70, 33],
[41, 48, 72, 33, 47, 32, 37, 16, 94, 29],
[53, 71, 44, 65, 25, 43, 91, 52, 97, 51, 14],
[70, 11, 33, 28, 77, 73, 17, 78, 39, 68, 17, 57],
[91, 71, 52, 38, 17, 14, 91, 43, 58, 50, 27, 29, 48],
[63, 66,  4, 68, 89, 53, 67, 30, 73, 16, 69, 87, 40, 31],
[ 4, 62, 98, 27, 23,  9, 70, 98, 73, 93, 38, 53, 60,  4, 23]
]

sums = []
row = []
for i in range(0,1+len(triangle)):
    row.append(0)
sums.append(row)
for i in range(0,len(triangle)):
    u = len(triangle)-i-1
    row = []
    for j in range(0,len(triangle[u])):
        m = max(sums[i][j],sums[i][j+1])
        row.append(triangle[u][j]+m)
    sums.append(row)
print sums[len(sums)-1][0]
</pre>
        <p>Answer: 1074</p>
        <p>Time: &lt;1ms</p>
      </div>
    </div>
    
    <div class="right">
      <h3><a href="http://projecteuler.net/problem=19">Problem 19</a></h3>
      <div class="blurb">
        <blockquote>
        You are given the following information, but you may prefer to do some research for yourself.<br />
<br />
1 Jan 1900 was a Monday.<br />
Thirty days has September,<br />
April, June and November.<br />
All the rest have thirty-one,<br />
Saving February alone,<br />
Which has twenty-eight, rain or shine.<br />
And on leap years, twenty-nine.<br />
A leap year occurs on any year evenly divisible by \(4\), but not on a century unless it is divisible by \(400\).<br />
How many Sundays fell on the first of the month during the twentieth century (1 Jan 1901 to 31 Dec 2000)?
        </blockquote>
        <p>Solution: Not a pretty one, but a fast one.</p>
        <pre class="euler">
days = [31,28,31,30,31,30,31,31,30,31,30,31]

n=0
d=2 # Jan 1st 1901 was a Tuesday
for y in range(1,101):
    for m in range(0,12):
        d += days[m]
        if m==1 and y%4==0:
            d += 1
        if d%7==0:
            n+=1
print n
</pre>
        <p>Answer: 171</p>
        <p>Time: 1ms</p>
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