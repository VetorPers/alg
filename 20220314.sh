tail -n 3 tt.txt
seq 0 500 | sed -n '1~7p'
seq 0 500 | awk '{if($1%7==0){print $0;}}'
awk '{if(NR==5){print $0;}}' tt.txt
sed -n '/^$/=' tt.txt
awk '{if($1==null){next;}{print $0;}}' tt.txt
sed '/^$/d' tt.txt
awk -F " " '{for(i=1;i<=NF;i++){if(length($i)<8){print $i;}}}' nowcoder.txt
cat nowcoder.txt | xargs -n1 | awk 'length($1)<8{print $1;}'
awk '{ for(i=1;i<=NF;i++){ a[$i]++; } }END{ for(x in a){ print x,a[x]; } }'