import { UsersFePage } from './app.po';

describe('users-fe App', function() {
  let page: UsersFePage;

  beforeEach(() => {
    page = new UsersFePage();
  });

  it('should display message saying app works', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('app works!');
  });
});
