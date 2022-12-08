#include <iostream>
#include <cmath>
#include <ctime>
using namespace std;

class LinkedList;

class ListNode{
    friend class LinkedList;
    private:
        int coef, exp;
        ListNode *next;
};

class LinkedList{
    public:
        LinkedList();
        void insert(int coef, int exp);
        void print();
        LinkedList arrange(LinkedList polynomial);
        LinkedList multiply(LinkedList polynomial);
    private:
        ListNode *first, *last;
};

LinkedList::LinkedList(){
    first = new ListNode;
    last = new ListNode;
    first->next = NULL;
    last->next = NULL;
}

//將新增的coef和exp放入
void LinkedList::insert(int coef, int exp){
    ListNode *p = new ListNode;
    p->coef = coef;
    p->exp = exp;
    p->next = NULL;
    if(first->next != NULL){
        last->next->next = p;
    }
    else{
        first->next = p;
    }
    last->next = p;
}

//print多項式資料
void LinkedList::print(){
    ListNode *current = new ListNode;
    current->next = first->next;
    while (current->next != NULL){
        current  = current->next;
        if(current->exp == 0){
            cout << current ->coef;
        }
        else if(current->coef != 0){
            cout << "(" << current->coef << "x^" << current->exp << ")";
            if (current->next != NULL && current->next->coef > 0){
                cout << "+";
            }
        }
    }
    cout << endl;
}

//多項式同次方項合併且確定降冪排列
LinkedList LinkedList::arrange(LinkedList polynomial){
    LinkedList final;
    ListNode *p = new ListNode;
    ListNode *q = new ListNode;
    p = first->next;
    q = polynomial.first->next;
    if(p == NULL && q == NULL){
        return final;
    }
    else{
        while (1){
            if(p == NULL && q == NULL){
                break;
            }
            else{
                //降冪排列
                if(p->exp > q->exp){
                    final.insert(p->coef, p->exp);
                    if(p->next == NULL){
                        while (q != NULL){
                            final.insert(q->coef, q->exp);
                            q = q->next;
                        }
                    }
                    p = p->next;
                }
                else if(p->exp < q->exp){
                    final.insert(q->coef, q->exp);
                    if(q->next == NULL){
                        while (p != NULL){
                            final.insert(p->coef, p->exp);
                            p = p->next;
                        }
                    }
                    q = q->next;
                }
                //同次方項相加
                else{
                    final.insert(p->coef + q->coef, p->exp);
                    if(p->next == NULL && q->next != NULL){
                        p = p->next;
                        q = q->next;
                        while (q != NULL){
                            final.insert(q->coef, q->exp);
                            q = q->next;
                        }
                    }
                    else if(p->next != NULL && q->next == NULL){
                        q = q->next;
                        p = p->next;
                        while (p != NULL){
                            final.insert(p->coef, p->exp);
                            p = p->next;
                        }
                    }
                    else if(p->next != NULL && q->next != NULL){
                        p = p->next;
                        q = q->next;
                    }
                }
            }
        }
        return final;
    }
}

//多項式相乘
LinkedList LinkedList::multiply(LinkedList polynomial){
    LinkedList current;
    LinkedList tmp1;
    ListNode *p = new ListNode;
    ListNode *q = new ListNode;
    p = first->next;
    q = polynomial.first->next;
    for(int i = 0; ; i++){
        LinkedList tmp2;
        for(int j = 0; ; j++){
            tmp2.insert(p->coef * q->coef, p->exp + q->exp);
            if (q->next == NULL){
                break;
            }
            else q = q->next;
        }

        if(i == 0){
            current = tmp2;
            tmp1 = current;
        }
        else{
            current = tmp1.arrange(tmp2);
            tmp1 = current;
        }

        if (p->next == NULL){
            break;
        }
        else{
            p = p->next;
            q = polynomial.first->next;
        }     
    }
    return current;
}


int main(){
    clock_t Start, End;
    int m,n,coef,exp;
    LinkedList polynomial1;
    LinkedList polynomial2;
    LinkedList newpolynomial;  

    cout << "Input term of Polynomial1:";
    cin >> m;
    cout << "Polynomial1's coefficients and exponents in descending order :" << endl;
    for(int i = 0; i < m; i++){
        cin >> coef >> exp;
        polynomial1.insert(coef, exp);
    }

    cout << "Input term of Polynomial2:";
    cin >> n;
    cout << "Polynomial2's coefficients and exponents in descending order :" << endl;
    for(int i = 0; i < n; i++){
        cin >> coef >> exp;
        polynomial2.insert(coef, exp);
    }
    cout << endl;

    cout << "Polynomial 1 : " << endl;
    polynomial1.print();
    cout << "Polynomial 2 :" << endl;
    polynomial2.print();
    Start = clock();
    newpolynomial = polynomial1.multiply(polynomial2);
    End = clock();
    cout << "Newpolynomial : " << endl;
    newpolynomial.print();
    double Total = ((double)End-Start)/CLOCKS_PER_SEC;
    cout << "Total Time : " << Total << " sec" << endl;
    return 0;
}

// int main(){
//     int m = 10000;
//     int n = 10;
//     int coef,exp;
//     class LinkedList polynomial1;
//     class LinkedList polynomial2;
//     class LinkedList newpolynomial;
//     srand(time(NULL));

//     //輸入polynomial1的coef和exp
//     cout << "Polynomial1's terms : " << m << endl;
//     for(int i = m; i > 0; i--){
//         coef = rand();
//         exp = i;
//         polynomial1.insert(coef,exp);
//     }
//     cout << "Polynomial1 : ";
//     polynomial1.print();

//     //輸入polynomial2的coef和exp
//     cout << "Polynomial2's terms : " << n << endl;
//     for(int i = n; i > 0; i--){
//         coef = rand();
//         exp = i;
//         polynomial2.insert(coef,exp);
//     }
//     cout << "Polynomial2' : ";
//     polynomial2.print();

//     //計算Multiply所花費的時間及結果
//     clock_t Start,End;
//     double Total;
//     Start = clock();
//     newpolynomial = polynomial1.multiply(polynomial2);
//     End = clock();
//     newpolynomial.print();
//     Total = (double)(End-Start)/CLOCKS_PER_SEC;
//     cout << "Total Time : " << Total << " sec" << endl;
//     return 0;
// }
