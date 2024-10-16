describe('Session', () => {

    const existingUser = {
        email: 'joedoe@example.com',
        password: 'testtest123',
    }

    it('should allow a user to log in successfully with valid credentials', () => {
        cy.visit('/')

        cy.contains('Log In').click()

        cy.get('#email').type(existingUser.email)
        cy.get('#password').type(existingUser.password)

        cy.get('button[type="submit"]').click()

        cy.url().should('include', '/')
        cy.contains(existingUser.email).should('be.visible')
    })

    it('should allow a user to log out successfully after logging in', () => {
        cy.visit('/')

        cy.contains('Log In').click()

        cy.get('#email').type(existingUser.email)
        cy.get('#password').type(existingUser.password)

        cy.get('button[type="submit"]').click()

        cy.url().should('include', '/')
        cy.contains(existingUser.email).should('be.visible')

        cy.contains('Log Out').click()
        cy.contains('Guest').should('be.visible')
    })

})
