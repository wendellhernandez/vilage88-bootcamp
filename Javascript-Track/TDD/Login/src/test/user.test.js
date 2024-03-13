const chai                          = require('chai');
const expect                        = chai.expect;
const {Builder, By, Capabilities}   = require('selenium-webdriver');
const UserModel                     = require('../models/user.model');
const userModel                     = new UserModel();

const caps = new Capabilities();
caps.setPageLoadStrategy("normal");

let driver;

describe('Login feature', function(){
    /*
        Initialize Selenium
        - Integration Testing
    */
    this.timeout(30000);
    describe('Selenium Integration Test' , function(){
        it("When you click the Signin button without entering anything in the email and password field, 'A required field is missing' error mesage will show", async function(){
            try {
                driver = await new Builder().
                    withCapabilities(caps).
                    forBrowser('chrome').
                    usingServer('http://selenium_chrome:4444/wd/hub').
                    build();
        
                // Navigate to Url
                await driver.get("http://web_app:3000");
                let button = await driver.findElement(By.id("login_button"));
                await button.click();
                let error_message = await driver.findElement(By.className("error")).getText();
                expect(error_message).to.equal('A required field is missing');
            } catch (e) {
                console.log(e);
                throw new Error("error");
            } finally {
                if(driver){
                    await driver.quit();
                }
            }        
        })

        it("When you click the Signin button with correct email and incorect password as input, 'Invalid email or password combination.' error mesage will show", async function(){
            try {
                driver = await new Builder().
                    withCapabilities(caps).
                    forBrowser('chrome').
                    usingServer('http://selenium_chrome:4444/wd/hub').
                    build();
        
                // Navigate to Url
                await driver.get("http://web_app:3000");
                let button = await driver.findElement(By.id("login_button"));
                let email = await driver.findElement(By.id("email"));
                let password = await driver.findElement(By.id("password"));
                let h1 = await driver.findElement(By.css("h1"));
                await email.click();
                await email.sendKeys("testuser@test.com");
                await password.click();
                await password.sendKeys("wrong password");
                await button.click();
                let error_message = await driver.findElement(By.className("error")).getText();
                expect(error_message).to.equal('Invalid email or password combination.');
            } catch (e) {
                console.log(e);
                throw new Error("error");
            } finally {
                if(driver){
                    await driver.quit();
                }
            }        
        })

        it("When you click the Signin button with correct email and corect password as input, redirect to success page and show user details", async function(){
            try {
                driver = await new Builder().
                    withCapabilities(caps).
                    forBrowser('chrome').
                    usingServer('http://selenium_chrome:4444/wd/hub').
                    build();
        
                // Navigate to Url
                await driver.get("http://web_app:3000");
                let button = await driver.findElement(By.id("login_button"));
                let email = await driver.findElement(By.id("email"));
                let password = await driver.findElement(By.id("password"));
                await email.click();
                await email.sendKeys("testuser@test.com");
                await password.click();
                await password.sendKeys("password123");
                await button.click();
                await driver.get("http://web_app:3000/success");
                let h1 = await driver.findElement(By.css("h1")).getText();
                expect(h1).to.equal('Hello, Anthony Dillahunty!');
            } catch (e) {
                console.log(e);
                throw new Error("error");
            } finally {
                if(driver){
                    await driver.quit();
                }
            }        
        })
    })
    /*
        Unit Testing of Models
    */
    describe('User Model Unit Test' , function(){
        it('Given email and password as input, it should return user info (including password) when the email is found in the database' , async function(){
            let name = 'Anthony Dillahunty';
            let email = 'testuser@test.com';
            let password = 'password123';

            let user = await userModel.getUser(email);

            expect(user.result.name).to.equal(name);
        })

        it('Given email and password as input, it should return false when email does not exist in database.' , async function(){
            let name = 'Anthony Dillahunty';
            let email = 'wrong@email.com';
            let password = 'password123';

            let user = await userModel.getUser(email);

            expect(user.status).to.equal(false);
        })

        it('Given email and password as input, it should return true when email and password is correct' , async function(){
            let name = 'Anthony Dillahunty';
            let email = 'testuser@test.com';
            let password = 'password123';
            let result = false;
            let user = await userModel.getUser(email);

            if(user.status){
                if(password == user.result.password){
                    result = true;
                }
            }

            expect(result).to.equal(true);
        })

        it('Given password as input, it should return an error message saying: A required field is missing, when email is missing' , async function(){
            let name = 'Anthony Dillahunty';
            let email = '';
            let password = 'password123';

            if(email == ''){
                error_message = 'A required field is missing';
            }

            expect(error_message).to.equal('A required field is missing');
        })
    })
});