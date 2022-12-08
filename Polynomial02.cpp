#include <iostream>
#include <cmath>
#include <ctime>
using namespace std;

class LinkedList;

class ListNode{
    friend class LinkedList;
    public:
        ListNode() : coef(0), exp(0), next(0){};
        ListNode(int c,int e) : coef(c), exp(e), next(0){};
    private:
        int coef;
        int exp;
        ListNode *next;
};

class LinkedList{
    public:
        LinkedList() : position(0){};
        void insert(int c,int e);
        void multiply(LinkedList& polynomial1 ,LinkedList& polynomial2);
        void combine(LinkedList& newpolynomial);
        void print();
    private:
        ListNode *position;
};

//將新增的coef和exp放入
void LinkedList::insert(int c,int e){
    ListNode *NewNode = new ListNode(c,e);
    if(position == NULL){
        position = NewNode;
        return;
    }
    ListNode *currentNode = position;
    while(currentNode->next != NULL){ 
        currentNode = currentNode->next;
    }
    currentNode->next = NewNode;
}

//多項式相乘
void LinkedList::multiply(LinkedList& polynomial1 ,LinkedList& polynomial2){
    int coef,exp;
    ListNode *currentNode1 = polynomial1.position;
    ListNode *currentNode2 = polynomial2.position;
    while(1){
        while(1){
            coef = (currentNode1->coef) * (currentNode2->coef);
            exp = (currentNode1->exp) + (currentNode2->exp);
            insert(coef,exp);
            if(currentNode2->next == NULL) break;
            else currentNode2 = currentNode2->next;
        }
        if(currentNode1->next == NULL) break;
        else{
            currentNode1 = currentNode1->next;
            currentNode2 = polynomial2.position;
        }
    }
}

void LinkedList::combine(LinkedList& newpolynomial){
    ListNode *currentNode = newpolynomial.position;
    ListNode *compareNode = newpolynomial.position;
    ListNode *deleteNode;
    while(currentNode->next != NULL){
        compareNode = currentNode->next;
        while(compareNode->next != NULL){
            if(currentNode->exp == compareNode->exp){
                currentNode->coef += compareNode->coef;
                currentNode->next = compareNode->next;
                deleteNode = compareNode;
                compareNode = compareNode->next;
                delete(deleteNode);
            }
            else compareNode = compareNode->next;
        }
        currentNode = currentNode->next;
    }
}

//print多項式資料
void LinkedList::print(){
    ListNode *currentNode = position;
    while(currentNode != 0){
        if(currentNode->coef < 0){
            cout << currentNode->coef;
        }
        else{
            cout << "(" << currentNode->coef;
            cout << "x^"<< currentNode->exp << ")";
        }
        if(currentNode->next != 0) cout << " + ";
        currentNode = currentNode->next;
    }
    cout << endl;
}

// int main(){
//     int m,n,coef,exp;
//     class LinkedList polynomial1;
//     class LinkedList polynomial2;
//     class LinkedList newpolynomial;

//     //輸入polynomial1的coef和exp
//     cout << "Polynomial1's terms : ";
//     cin >> m;
//     cout << "Polynomial1's coefficients and exponents in descending order :" << endl;
//     for(int i = 0; i < m; i++){
//         cin >> coef >> exp;
//         polynomial1.insert(coef,exp);
//     }

//     //輸入polynomial2的coef和exp
//     cout << "Polynomial2's terms : ";
//     cin >> n;
//     cout << "Polynomial2's coefficients and exponents in descending order :" << endl;
//     for(int i = 0; i < n; i++){
//         cin >> coef >> exp;
//         polynomial2.insert(coef,exp);
//     }

//     polynomial1.print();
//     polynomial2.print();

//     //計算Multiply所花費的時間及結果
//     clock_t Start,End;
//     double Total;
//     Start = clock();
//     newpolynomial.multiply(polynomial1,polynomial2);
//     End = clock();
//     newpolynomial.combine(newpolynomial);
//     cout << "Newpolynomial : " << endl;
//     newpolynomial.print();
//     Total = (double)(End-Start)/CLOCKS_PER_SEC;
//     cout << "TotalTime: " << Total << " sec"<< endl;
//     return 0;
// }

int main(){
    int m = 100;
    int n = 10;
    int coef,exp;
    class LinkedList polynomial1;
    class LinkedList polynomial2;
    class LinkedList newpolynomial;
    srand(time(NULL));

    //輸入polynomial1的coef和exp
    cout << "Polynomial1's terms : " << m << endl;
    for(int i = m; i > 0; i--){
        coef = rand();
        exp = i;
        polynomial1.insert(coef,exp);
    }
    cout << "Polynomial1's : ";
    polynomial1.print();

    //輸入polynomial2的coef和exp
    cout << "Polynomial2's terms : " << n << endl;
    for(int i = n; i > 0; i--){
        coef = rand();
        exp = i;
        polynomial2.insert(coef,exp);
    }
    cout << "Polynomial2's : ";
    polynomial2.print();

    //計算Multiply所花費的時間及結果
    clock_t Start,End;
    double Total;
    Start = clock();
    newpolynomial.multiply(polynomial1,polynomial2);
    newpolynomial.combine(newpolynomial);
    End = clock();
    newpolynomial.print();
    Total = (double)(End-Start)/CLOCKS_PER_SEC;
    cout << "TotalTime: " << Total << " sec"<< endl;
    return 0;
}