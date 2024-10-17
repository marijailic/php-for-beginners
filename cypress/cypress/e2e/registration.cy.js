import { faker } from '@faker-js/faker';

describe('Registration', () => {

    const fakeUser = {
        email: faker.internet.email(),
        password: '0123456789',
    }

    it('should allow user to register successfully with valid credentials', () => {
        cy.visit('/register')

        cy.get('#email').type(fakeUser.email)
        cy.get('#password').type(fakeUser.password)

        cy.get('button[type="submit"]').click()

        cy.get("div[data-test-id='homepage']").contains(fakeUser.email).should('be.visible')
    })

})
